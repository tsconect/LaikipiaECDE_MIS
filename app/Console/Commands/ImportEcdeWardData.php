<?php

namespace App\Console\Commands;

use App\Helpers\PhoneHelper;
use App\Models\EcdeSchools;
use App\Models\Learner;
use App\Models\SubLocation;
use App\Models\Teacher;
use App\Models\TeacherDeploymentHistory;
use App\Models\User;
use App\Models\Village;
use App\Models\Ward;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class ImportEcdeWardData extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'ecde:import-ward-data {--dry-run : Preview matches/counts without writing to the database}';

    /**
     * The console command description.
     */
    protected $description = 'Import ECDE schools, teachers and learners for every ward folder under public/org_units/New folder';

    private array $schoolCache = [];
    private array $subLocationCache = [];
    private array $villageCache = [];

    public function handle()
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);
        DB::disableQueryLog();

        $dryRun = (bool) $this->option('dry-run');

        $root = public_path('org_units/New folder');

        if (!is_dir($root)) {
            $this->error("Directory not found: {$root}");
            return Command::FAILURE;
        }

        $wards = Ward::all();
        $summary = [];

        foreach (glob($root . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR) as $wardDir) {

            $folderName = basename($wardDir);
            $ward = $this->resolveWard($folderName, $wards);

            if (!$ward) {
                $this->warn("Skipping '{$folderName}' - no matching ward found in the wards table.");
                continue;
            }

            $this->info("=== {$folderName} -> {$ward->name} ({$ward->id}) ===");

            $this->schoolCache = [];
            $this->subLocationCache = [];
            $this->villageCache = [];

            $this->preloadWardSchools($ward->id);

            $summary[$folderName] = [
                'schools' => $this->importSchools($wardDir, $ward, $dryRun),
                'teachers' => $this->importTeachers($wardDir, $ward, $dryRun),
                'learners' => $this->importLearners($wardDir, $ward, $dryRun),
            ];
        }

        $this->printSummary($summary, $dryRun);

        return Command::SUCCESS;
    }

    /*
    |--------------------------------------------------------------------------
    | Ward resolution
    |--------------------------------------------------------------------------
    */

    private function resolveWard(string $folderName, $wards): ?Ward
    {
        $target = $this->normalizeWardKey($folderName);

        foreach ($wards as $ward) {
            if ($this->normalizeWardKey((string) $ward->name) === $target) {
                return $ward;
            }
        }

        return null;
    }

    private function normalizeWardKey(string $name): string
    {
        $name = strtolower($name);
        $name = str_replace('ward', '', $name);

        return preg_replace('/[^a-z]/', '', $name);
    }

    /*
    |--------------------------------------------------------------------------
    | Schools
    |--------------------------------------------------------------------------
    */

    private function preloadWardSchools(string $wardId): void
    {
        foreach (EcdeSchools::where('ward_id', $wardId)->get() as $school) {
            $key = $this->normalizeSchoolKey($school->school_name);

            if ($key !== '') {
                $this->schoolCache[$key] = $school;
            }
        }
    }

    private function importSchools(string $wardDir, Ward $ward, bool $dryRun): array
    {
        $imported = 0;
        $skipped = 0;

        [$file, $sheetName] = $this->locateSource($wardDir, '/^schools?(\s+done)?$/i', 'school', ['coordinat', 'teacher']);

        if (!$file) {
            $this->warn('  No schools source found.');
            return compact('imported', 'skipped');
        }

        foreach ($this->readMappedRows($file, $sheetName) as $row) {

            $schoolName = $this->cleanText($row['school_name'] ?? null);

            if (!$schoolName) {
                $skipped++;
                continue;
            }

            $key = $this->normalizeSchoolKey($schoolName);

            if ($key !== '' && isset($this->schoolCache[$key])) {
                $skipped++;
                continue;
            }

            $existing = EcdeSchools::whereRaw('LOWER(school_name) = ?', [strtolower($schoolName)])->first();

            if ($existing) {
                $this->schoolCache[$key] = $existing;
                $skipped++;
                continue;
            }

            if ($dryRun) {
                $this->schoolCache[$key] = new EcdeSchools(['school_name' => $schoolName]);
                $imported++;
                continue;
            }

            $subLocationName = $this->cleanText($row['sub_location'] ?? null);
            $subLocation = $subLocationName ? $this->findOrCreateSubLocation($subLocationName, $ward->id) : null;

            $school = EcdeSchools::create([
                'school_name' => $schoolName,
                'center_code' => $this->cleanText($row['center_code'] ?? null),
                'ward_id' => $ward->id,
                'sub_location_id' => $subLocation?->id,
                'reg_number' => $this->cleanText($row['reg_number'] ?? null),
                'feeder_school' => strtolower((string) ($row['feeder_school'] ?? '')) === 'yes' ? 'Yes' : 'No',
                'remarks' => $this->cleanText($row['remarks'] ?? null),
                'school_location' => $subLocationName,
            ]);

            $this->schoolCache[$key] = $school;
            $imported++;
        }

        $this->info("  Schools: imported {$imported}, skipped {$skipped} (source: {$this->describeSource($file, $sheetName)})");

        return compact('imported', 'skipped');
    }

    private function normalizeSchoolKey(?string $name): string
    {
        if (!$name) {
            return '';
        }

        $name = strtolower($name);
        $name = preg_replace('/[^a-z0-9]+/', ' ', $name);

        $words = array_filter(explode(' ', $name), function ($word) {
            return $word !== '' && !in_array($word, ['ecde', 'centre', 'center'], true);
        });

        return trim(implode(' ', $words));
    }

    private function matchSchool($rawName): ?EcdeSchools
    {
        $name = trim((string) $rawName);

        if ($name === '') {
            return null;
        }

        $key = $this->normalizeSchoolKey($name);

        if ($key === '') {
            return null;
        }

        if (isset($this->schoolCache[$key])) {
            return $this->schoolCache[$key];
        }

        $best = null;
        $bestPct = 0.0;

        foreach ($this->schoolCache as $cachedKey => $school) {
            similar_text($key, $cachedKey, $pct);

            if ($pct > $bestPct) {
                $bestPct = $pct;
                $best = $school;
            }
        }

        return ($best && $bestPct >= 80.0) ? $best : null;
    }

    /*
    |--------------------------------------------------------------------------
    | Teachers
    |--------------------------------------------------------------------------
    */

    private function importTeachers(string $wardDir, Ward $ward, bool $dryRun): array
    {
        $imported = 0;
        $skipped = 0;

        [$file, $sheetName] = $this->locateSource($wardDir, '/^teachers?(\s+done)?$/i', 'teacher', ['coordinat']);

        if (!$file) {
            $this->warn('  No teachers source found.');
            return compact('imported', 'skipped');
        }

        foreach ($this->readMappedRows($file, $sheetName) as $row) {

            $firstName = $this->cleanText($row['first_name'] ?? null);
            $lastName = $this->cleanText($row['last_name'] ?? null);

            if (!$firstName || !$lastName) {
                $skipped++;
                continue;
            }

            $idNumber = $this->cleanText($row['id_number'] ?? null);
            $email = strtolower(trim((string) ($row['email'] ?? '')));

            if ($email !== '' && User::where('email', $email)->exists()) {
                $skipped++;
                continue;
            }

            if ($idNumber && Teacher::where('id_number', $idNumber)->exists()) {
                $skipped++;
                continue;
            }

            $school = $this->matchSchool($row['school'] ?? null);

            if (!$school) {
                $skipped++;
                continue;
            }

            if ($dryRun) {
                $imported++;
                continue;
            }

            $middleName = $this->cleanText($row['middle_name'] ?? null) ?: 'N/A';

            if ($email === '') {
                $email = strtolower(Str::slug($firstName . $middleName . $lastName, '')) . '@ecde.com';
            }

            if (User::where('email', $email)->exists()) {
                $email = strtolower(Str::slug($firstName . $middleName . $lastName . random_int(1000, 9999), '')) . '@ecde.com';
            }

            $phoneNumber = $this->cleanText($row['phone_number'] ?? null);
            $phoneNumber = PhoneHelper::normalizePhoneNumber($phoneNumber) ?: $phoneNumber;

            $pwdStatus = $this->cleanText($row['pwd_status'] ?? null);
            $dob = $this->parseFlexibleDate($row['dob'] ?? null);

            $retirementDate = null;

            if ($dob) {
                $retirementDate = Carbon::parse($dob)
                    ->addYears($pwdStatus === 'Yes' ? 65 : 60)
                    ->format('Y-m-d');
            }

            try {

                $user = User::create([
                    'first_name' => $firstName,
                    'middle_name' => $middleName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'password' => Hash::make('123456'),
                    'role' => 'teacher',
                    'phone_number' => $phoneNumber,
                    'id_number' => $idNumber,
                    'username' => $idNumber,
                    'status' => 'active',
                ]);

                $appointmentDate = $this->parseFlexibleDate($row['date_of_first_appointment'] ?? null);

                Teacher::create([
                    'user_id' => $user->id,
                    'id_number' => $idNumber,
                    'kra_pin' => strtoupper((string) ($this->cleanText($row['kra_pin'] ?? null))),
                    'gender' => $this->cleanText($row['gender'] ?? null),
                    'dob' => $dob,
                    'tsc_number' => $this->cleanText($row['tsc_number'] ?? null),
                    'school_id' => $school->id,
                    'ippd_number' => $this->cleanText($row['ippd_number'] ?? null),
                    'date_of_first_appointment' => $appointmentDate,
                    'terms_of_engagement' => $this->cleanText($row['terms_of_service'] ?? null),
                    'pwd_status' => $pwdStatus,
                    'disability_type' => $this->cleanText($row['pwd_type'] ?? null),
                    'pwd_number' => $this->cleanText($row['pwd_number'] ?? null),
                    'ward_id' => $ward->id,
                    'retirement_date' => $retirementDate,
                    'job_group' => $this->cleanText($row['job_group'] ?? null),
                    'remarks' => $this->cleanText($row['remarks'] ?? null),
                    'ethnicity' => $this->cleanText($row['ethnicity'] ?? null),
                ]);

                if ($appointmentDate) {
                    TeacherDeploymentHistory::create([
                        'user_id' => $user->id,
                        'school_id' => $school->id,
                        'deployment_date' => $appointmentDate,
                        'start_date' => $appointmentDate,
                        'end_date' => null,
                        'reason' => null,
                    ]);
                }

                $imported++;

            } catch (\Exception $e) {

                $skipped++;
                Log::error("Failed importing teacher {$firstName} {$lastName}: " . $e->getMessage());
            }
        }

        $this->info("  Teachers: imported {$imported}, skipped {$skipped} (source: {$this->describeSource($file, $sheetName)})");

        return compact('imported', 'skipped');
    }

    /*
    |--------------------------------------------------------------------------
    | Learners
    |--------------------------------------------------------------------------
    */

    private function importLearners(string $wardDir, Ward $ward, bool $dryRun): array
    {
        $imported = 0;
        $skipped = 0;

        [$file, $sheetName] = $this->locateSource($wardDir, '/^(all\s+)?learners?(\s+done)?$/i', 'learner');

        if (!$file) {
            $this->warn('  No learners source found.');
            return compact('imported', 'skipped');
        }

        $seen = [];

        foreach ($this->readMappedRows($file, $sheetName) as $row) {

            $firstName = $this->cleanText($row['first_name'] ?? null);

            if (!$firstName) {
                $skipped++;
                continue;
            }

            $school = $this->matchSchool($row['school'] ?? null);

            if (!$school) {
                $skipped++;
                continue;
            }

            $lastName = $this->cleanText($row['last_name'] ?? null);
            $admissionNumber = $this->cleanText($row['admission_number'] ?? null);
            $dob = $this->parseFlexibleDate($row['dob'] ?? null);

            $dedupeKey = strtolower($firstName . '|' . $lastName . '|' . $school->id . '|' . ($admissionNumber ?: $dob));

            if (isset($seen[$dedupeKey])) {
                $skipped++;
                continue;
            }

            $seen[$dedupeKey] = true;

            $existsQuery = Learner::where('school_id', $school->id)
                ->whereRaw('LOWER(first_name) = ?', [strtolower($firstName)])
                ->whereRaw('LOWER(COALESCE(last_name, "")) = ?', [strtolower((string) $lastName)]);

            if ($admissionNumber) {
                $existsQuery->where('admission_number', $admissionNumber);
            } else {
                $existsQuery->whereNull('admission_number')->where('dob', $dob);
            }

            if ($existsQuery->exists()) {
                $skipped++;
                continue;
            }

            if ($dryRun) {
                $imported++;
                continue;
            }

            $subLocationName = $this->cleanText($row['sub_location'] ?? null);
            $villageName = $this->cleanText($row['village'] ?? null);

            $subLocation = $subLocationName ? $this->findOrCreateSubLocation($subLocationName, $ward->id) : null;
            $village = $villageName ? $this->findOrCreateVillage($villageName, $subLocation?->id) : null;

            try {

                Learner::create([
                    'first_name' => $firstName,
                    'middle_name' => $this->cleanText($row['middle_name'] ?? null),
                    'last_name' => $lastName,
                    'birth_certificate_number' => $this->cleanText($row['birth_certificate_number'] ?? null),
                    'pwd_status' => $this->cleanText($row['pwd_status'] ?? null),
                    'disability_type' => $this->cleanText($row['pwd_type'] ?? null),
                    'pwd_number' => $this->cleanText($row['pwd_number'] ?? null),
                    'dob' => $dob,
                    'nemis_number' => $this->cleanText($row['nemis_number'] ?? null),
                    'gender' => $this->cleanText($row['gender'] ?? null),
                    'sub_location_id' => $subLocation?->id,
                    'village' => $villageName,
                    'village_id' => $village?->id,
                    'school_id' => $school->id,
                    'class' => $this->cleanText($row['class'] ?? null),
                    'mode_of_admission' => $this->cleanText($row['mode_of_admission'] ?? null),
                    'date_of_admission' => $this->parseFlexibleDate($row['date_of_admission'] ?? null),
                    'admission_number' => $admissionNumber,
                    'ward_id' => $ward->id,
                    'nationality' => $this->cleanText($row['nationality'] ?? null),
                    'parental_status' => $this->cleanText($row['parent_details'] ?? null),
                ]);

                $imported++;

            } catch (\Exception $e) {

                $skipped++;
                Log::error("Failed importing learner {$firstName} {$lastName}: " . $e->getMessage());
            }
        }

        $this->info("  Learners: imported {$imported}, skipped {$skipped} (source: {$this->describeSource($file, $sheetName)})");

        return compact('imported', 'skipped');
    }

    /*
    |--------------------------------------------------------------------------
    | Sub-location / village lookups
    |--------------------------------------------------------------------------
    */

    private function findOrCreateSubLocation(string $name, string $wardId): ?SubLocation
    {
        $cacheKey = strtolower($name) . '|' . $wardId;

        if (isset($this->subLocationCache[$cacheKey])) {
            return $this->subLocationCache[$cacheKey];
        }

        $subLocation = SubLocation::whereRaw('LOWER(name) = ?', [strtolower($name)])
            ->where('ward_id', $wardId)
            ->first();

        if (!$subLocation) {
            $subLocation = SubLocation::create([
                'name' => $this->cleanText($name),
                'ward_id' => $wardId,
            ]);
        }

        return $this->subLocationCache[$cacheKey] = $subLocation;
    }

    private function findOrCreateVillage(string $name, ?int $subLocationId): ?Village
    {
        $cacheKey = strtolower($name) . '|' . ($subLocationId ?? '0');

        if (isset($this->villageCache[$cacheKey])) {
            return $this->villageCache[$cacheKey];
        }

        $query = Village::whereRaw('LOWER(name) = ?', [strtolower($name)]);

        $subLocationId ? $query->where('sub_location_id', $subLocationId) : $query->whereNull('sub_location_id');

        $village = $query->first();

        if (!$village) {
            $village = Village::create([
                'name' => $this->cleanText($name),
                'sub_location_id' => $subLocationId,
            ]);
        }

        return $this->villageCache[$cacheKey] = $village;
    }

    /*
    |--------------------------------------------------------------------------
    | Source file discovery
    |--------------------------------------------------------------------------
    */

    /**
     * Find the best source for a category: prefer a cleanly named workbook
     * (e.g. "Schools Done.xlsx"), falling back to any other workbook in the
     * folder. Either way, the actual sheet is always chosen by content — a
     * "clean" filename is not a guarantee the workbook only has one sheet
     * (e.g. some "Schools Done.xlsx" files are really Coordinators+Schools
     * combo workbooks), so index 0 can never be assumed to be the right one.
     */
    private function locateSource(string $dir, string $cleanPattern, string $needle, array $excludes = []): array
    {
        $cleanFiles = [];
        $otherFiles = [];

        foreach (glob($dir . DIRECTORY_SEPARATOR . '*.xlsx') as $file) {
            $base = trim(preg_replace('/\s+/', ' ', pathinfo($file, PATHINFO_FILENAME)));

            if (preg_match($cleanPattern, $base)) {
                $cleanFiles[] = $file;
            } else {
                $otherFiles[] = $file;
            }
        }

        foreach ($cleanFiles as $file) {
            $sheetName = $this->pickSheet($file, $needle, $excludes, true);

            if ($sheetName !== null) {
                return [$file, $sheetName];
            }
        }

        foreach ($otherFiles as $file) {
            $sheetName = $this->pickSheet($file, $needle, $excludes, false);

            if ($sheetName !== null) {
                return [$file, $sheetName];
            }
        }

        return [null, null];
    }

    /**
     * A "clean" filename (e.g. "Schools Done.xlsx") tells us the whole file is
     * about this category, so if it only has one sheet that sheet is trivially
     * the right one even if it's generically named "Sheet1". Files that only
     * qualify via the fallback scan get no such benefit of the doubt — their
     * sheet must be identified by name, otherwise an unrelated single-sheet
     * workbook (e.g. teachers.xlsx while searching for schools) could be
     * picked up by accident.
     */
    private function pickSheet(string $file, string $needle, array $excludes, bool $isCleanFile): ?string
    {
        try {
            $sheetNames = IOFactory::createReaderForFile($file)->listWorksheetNames($file);
        } catch (\Exception $e) {
            return null;
        }

        if ($isCleanFile && count($sheetNames) === 1) {
            return $sheetNames[0];
        }

        foreach ($sheetNames as $sheetName) {
            $n = strtolower($sheetName);

            $excluded = false;
            foreach ($excludes as $ex) {
                if (str_contains($n, $ex)) {
                    $excluded = true;
                    break;
                }
            }

            if (!$excluded && str_contains($n, $needle)) {
                return $sheetName;
            }
        }

        return null;
    }

    private function describeSource(?string $file, ?string $sheetName): string
    {
        if (!$file) {
            return 'n/a';
        }

        return basename($file) . ($sheetName ? " / {$sheetName}" : '');
    }

    /*
    |--------------------------------------------------------------------------
    | Sheet reading + header mapping
    |--------------------------------------------------------------------------
    */

    private function readMappedRows(string $file, ?string $sheetName): array
    {
        $rows = $this->readSheetRows($file, $sheetName);

        if (!$rows) {
            return [];
        }

        $headerIdx = $this->detectHeaderRow($rows);

        if ($headerIdx === null) {
            return [];
        }

        $colMap = [];

        foreach ($rows[$headerIdx] as $i => $label) {
            $key = $this->canonicalizeHeader((string) ($label ?? ''));

            if ($key) {
                $colMap[$i] = $key;
            }
        }

        $mapped = [];

        foreach (array_slice($rows, $headerIdx + 1, null, true) as $row) {

            $entry = [];
            $hasData = false;

            foreach ($colMap as $i => $key) {
                $value = $row[$i] ?? null;

                if ($value !== null && trim((string) $value) !== '') {
                    $hasData = true;
                }

                $entry[$key] = $value;
            }

            if ($hasData) {
                $mapped[] = $entry;
            }
        }

        return $mapped;
    }

    private function readSheetRows(string $file, ?string $sheetName): ?array
    {
        try {

            $reader = IOFactory::createReaderForFile($file);
            $reader->setReadDataOnly(true);

            if ($sheetName) {
                $reader->setLoadSheetsOnly([$sheetName]);
            }

            $spreadsheet = $reader->load($file);
            $sheet = $sheetName ? $spreadsheet->getSheetByName($sheetName) : $spreadsheet->getSheet(0);

            if (!$sheet) {
                return null;
            }

            $rows = $sheet->toArray(null, true, false, false);

            $spreadsheet->disconnectWorksheets();
            unset($spreadsheet);

            return $rows;

        } catch (\Exception $e) {

            Log::error("Failed reading {$file}" . ($sheetName ? " ({$sheetName})" : '') . ': ' . $e->getMessage());

            return null;
        }
    }

    private function detectHeaderRow(array $rows): ?int
    {
        foreach (array_slice($rows, 0, 5, true) as $idx => $row) {

            $matches = 0;

            foreach ($row as $cell) {
                if ($cell !== null && $this->canonicalizeHeader((string) $cell) !== null) {
                    $matches++;
                }
            }

            if ($matches >= 3) {
                return $idx;
            }
        }

        return null;
    }

    private function canonicalizeHeader(string $raw): ?string
    {
        $h = preg_replace('/[^a-z0-9]/', '', strtolower(trim($raw)));

        if ($h === '' || in_array($h, ['sno', 'sn', 'no', 'n'], true)) {
            return null;
        }

        return match (true) {
            str_contains($h, 'birthcert') => 'birth_certificate_number',
            str_contains($h, 'nemis') => 'nemis_number',
            str_contains($h, 'pwdstatus') => 'pwd_status',
            str_contains($h, 'pwdtype') => 'pwd_type',
            str_contains($h, 'pwd') => 'pwd_number',
            str_contains($h, 'first') && str_contains($h, 'name') => 'first_name',
            str_contains($h, 'middle') && str_contains($h, 'name') => 'middle_name',
            str_contains($h, 'last') && str_contains($h, 'name') => 'last_name',
            str_contains($h, 'nationality') => 'nationality',
            str_contains($h, 'gender') => 'gender',
            str_contains($h, 'dateofbirth') || $h === 'dob' => 'dob',
            str_contains($h, 'ethnicity') => 'ethnicity',
            str_contains($h, 'email') => 'email',
            str_contains($h, 'phone') => 'phone_number',
            str_contains($h, 'idnumber') => 'id_number',
            str_contains($h, 'ippd') => 'ippd_number',
            str_contains($h, 'kra') => 'kra_pin',
            str_contains($h, 'tsc') => 'tsc_number',
            str_contains($h, 'firstappointment') => 'date_of_first_appointment',
            str_contains($h, 'termsof') => 'terms_of_service',
            str_contains($h, 'jobgroup') => 'job_group',
            str_contains($h, 'modeofadmission') => 'mode_of_admission',
            str_contains($h, 'adm') => str_contains($h, 'date') ? 'date_of_admission' : 'admission_number',
            str_contains($h, 'parentdetail') || str_contains($h, 'parentstatus') || str_contains($h, 'parentcleaned') => 'parent_details',
            str_contains($h, 'sublocation') => 'sub_location',
            str_contains($h, 'village') => 'village',
            str_contains($h, 'class') => 'class',
            str_contains($h, 'remark') => 'remarks',
            str_contains($h, 'schoolcentername') => 'school_name',
            str_contains($h, 'schoolcentercode') => 'center_code',
            str_contains($h, 'registrationnumber') || str_contains($h, 'regno') => 'reg_number',
            str_contains($h, 'feeder') => 'feeder_school',
            $h === 'school' || $h === 'schools' => 'school',
            default => null,
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Value cleaning
    |--------------------------------------------------------------------------
    */

    private function cleanText($value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim((string) $value);

        if ($value === '' || in_array(strtolower($value), ['n/a', 'na', 'nil', 'none'], true)) {
            return null;
        }

        return Str::title(strtolower($value));
    }

    private function parseFlexibleDate($value): ?string
    {
        if ($value === null) {
            return null;
        }

        if (is_numeric($value)) {

            $val = (float) $value;

            if ($val > 20000 && $val < 60000) {
                try {
                    return ExcelDate::excelToDateTimeObject($val)->format('Y-m-d');
                } catch (\Exception $e) {
                    return null;
                }
            }

            return null;
        }

        $value = trim((string) $value);

        if ($value === '' || in_array(strtolower($value), ['n/a', 'na', 'nil', 'none'], true)) {
            return null;
        }

        if (preg_match('#^(\d{1,2})[/\-.](\d{1,2})[/\-.](\d{4})$#', $value, $m)) {

            $year = (int) $m[3];
            $a = (int) $m[1];
            $b = (int) $m[2];

            if ($a > 12) {
                [$day, $month] = [$a, $b];
            } elseif ($b > 12) {
                [$day, $month] = [$b, $a];
            } else {
                // Ambiguous — default to the Kenyan d/m/Y convention used across these sheets.
                [$day, $month] = [$a, $b];
            }

            return checkdate($month, $day, $year) ? sprintf('%04d-%02d-%02d', $year, $month, $day) : null;
        }

        try {
            $date = Carbon::parse($value);

            if ($date->year > 1900 && $date->year < 2100) {
                return $date->format('Y-m-d');
            }
        } catch (\Exception $e) {
            // fall through
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Reporting
    |--------------------------------------------------------------------------
    */

    private function printSummary(array $summary, bool $dryRun): void
    {
        $this->newLine();
        $this->info($dryRun ? '=== DRY RUN SUMMARY ===' : '=== IMPORT SUMMARY ===');

        $rows = [];
        $totals = ['schools' => [0, 0], 'teachers' => [0, 0], 'learners' => [0, 0]];

        foreach ($summary as $wardFolder => $stats) {

            $rows[] = [
                $wardFolder,
                "{$stats['schools']['imported']}/{$stats['schools']['skipped']}",
                "{$stats['teachers']['imported']}/{$stats['teachers']['skipped']}",
                "{$stats['learners']['imported']}/{$stats['learners']['skipped']}",
            ];

            foreach (['schools', 'teachers', 'learners'] as $category) {
                $totals[$category][0] += $stats[$category]['imported'];
                $totals[$category][1] += $stats[$category]['skipped'];
            }
        }

        if ($rows) {
            $this->table(['Ward folder', 'Schools (in/skip)', 'Teachers (in/skip)', 'Learners (in/skip)'], $rows);
        }

        $this->info(sprintf(
            'Totals — Schools: %d/%d, Teachers: %d/%d, Learners: %d/%d',
            $totals['schools'][0], $totals['schools'][1],
            $totals['teachers'][0], $totals['teachers'][1],
            $totals['learners'][0], $totals['learners'][1],
        ));
    }
}
