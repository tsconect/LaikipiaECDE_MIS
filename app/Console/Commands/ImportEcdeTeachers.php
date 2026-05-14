<?php

namespace App\Console\Commands;

use App\Helpers\PhoneHelper;
use App\Models\EcdeSchools;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Ward;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImportEcdeTeachers extends Command
{
    /**
     * Command signature
     */
    protected $signature = 'ecde:import-teachers';

    /**
     * Command description
     */
    protected $description = 'Import ECDE teachers from JSON file';

    /**
     * Execute command
     */
    public function handle()
    {
        try {

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            DB::disableQueryLog();

            $filePath = public_path('org_units/igwamiti_ecde_teachers.json');

            if (!file_exists($filePath)) {

                $this->error("JSON file not found at: {$filePath}");

                return Command::FAILURE;
            }

            $json = file_get_contents($filePath);

            $rows = json_decode($json, true);

            if (!$rows || count($rows) == 0) {

                $this->error('No data found in JSON file.');

                return Command::FAILURE;
            }

            $imported = 0;
            $skipped = 0;

            $this->info("Starting teachers import...");

            foreach ($rows as $index => $row) {

                try {

                    /*
                    |--------------------------------------------------------------------------
                    | Extract Data
                    |--------------------------------------------------------------------------
                    */

                    $firstName = $this->cleanText($row['First Name'] ?? null);

                    $middleName = $this->cleanText($row['Middle Name'] ?? null);

                    $lastName = $this->cleanText($row['Last Name'] ?? null);

                    $pwdStatus = $this->cleanText($row['PWD Status'] ?? null);

                    $pwdType = $this->cleanText($row['PWD Type '] ?? null);

                    $pwdNumber = $this->cleanText($row['PWD Number'] ?? null);

                    $ethnicity = $this->cleanText($row['Ethnicity'] ?? null);

                    $email = trim($row['Email'] ?? '');

                    $phoneNumber = $this->cleanText($row['Phone Number'] ?? null);

                    $phoneNumber = PhoneHelper::normalizePhoneNumber($phoneNumber);

                    $idNumber = $this->cleanText($row['ID Number'] ?? null);

                    $ippdNumber = $this->cleanText($row['IPPD Number'] ?? null);

                    $kraPin = strtoupper(trim($row['KRA Pin'] ?? ''));

                    $gender = $this->cleanText($row['Gender'] ?? null);

                    $dob = $row['Date of Birth(mm/dd/yyyy)'] ?? null;

                    $tscNumber = $this->cleanText($row['TSC Number(if available)'] ?? null);

                    $dateOfAppointment = $row['Date of First Appointment(mm/dd/yyyy)'] ?? null;

                    $terms = $this->cleanText($row['Terms of Service'] ?? null);

                    $jobGroup = $this->cleanText($row['Job Group'] ?? null);

                    $wardName = $this->cleanText($row['Ward'] ?? null);

                    $schoolName = $this->cleanText($row['School'] ?? null);

                    $remarks = $this->cleanText($row['REMARKS'] ?? null);

                    /*
                    |--------------------------------------------------------------------------
                    | Skip Empty Rows
                    |--------------------------------------------------------------------------
                    */

                    if (!$firstName || !$lastName) {

                        Log::warning("Skipped empty teacher row at {$index}");

                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Prevent Duplicate Teachers
                    |--------------------------------------------------------------------------
                    */

                    $existingTeacher = Teacher::where('id_number', $idNumber)
                        // ->orWhere('tsc_number', $tscNumber)
                        // ->orWhere('ippd_number', $ippdNumber)
                        ->first();

                    if ($existingTeacher) {

                        $skipped++;

                        Log::warning("Duplicate teacher skipped: {$firstName} {$lastName}");

                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Find School
                    |--------------------------------------------------------------------------
                    */

                    $school = EcdeSchools::whereRaw(
                        'LOWER(school_name) = ?',
                        [strtolower($schoolName)]
                    )->first();

                    if (!$school) {

                        $skipped++;

                        Log::warning(
                            "School not found for teacher {$firstName} {$lastName}: {$schoolName}"
                        );

                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Find Ward
                    |--------------------------------------------------------------------------
                    */

                    $ward = null;

                    if ($wardName) {

                        $ward = Ward::whereRaw(
                            'LOWER(name) = ?',
                            [strtolower($wardName)]
                        )->first();
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Generate Email If Missing
                    |--------------------------------------------------------------------------
                    */

                    if (empty($email)) {

                        $email = strtolower(
                            Str::slug(
                                $firstName .
                                $middleName .
                                $lastName,
                                ''
                            )
                        ) . '@ecde.com';
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Prevent Duplicate Emails
                    |--------------------------------------------------------------------------
                    */

                    $existingUser = User::where('email', $email)->first();

                    if ($existingUser) {

                        $email = strtolower(
                            Str::slug(
                                $firstName .
                                $middleName .
                                $lastName .
                                rand(100, 9999),
                                ''
                            )
                        ) . '@ecde.com';
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Format Dates
                    |--------------------------------------------------------------------------
                    */

                    $formattedDob = null;
                    $retirementDate = null;

                    if (!empty($dob)) {

                        try {

                            $formattedDob = Carbon::parse($dob)
                                ->format('Y-m-d');

                            $retirementDate = Carbon::parse($dob)
                                ->addYears(60)
                                ->format('Y-m-d');

                            if($pwdStatus == 'Yes'){
                                $retirementDate = Carbon::parse($dob)
                                    ->addYears(65)
                                    ->format('Y-m-d');
                                
                            }

                        } catch (\Exception $e) {

                            $formattedDob = null;
                            $retirementDate = null;
                        }
                    }

                    $formattedAppointmentDate = null;

                    if (!empty($dateOfAppointment)) {

                        try {

                            $formattedAppointmentDate = Carbon::parse($dateOfAppointment)
                                ->format('Y-m-d');

                        } catch (\Exception $e) {

                            $formattedAppointmentDate = null;
                        }
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Create User
                    |--------------------------------------------------------------------------
                    */

                    $user = User::create([

                        'first_name' => $firstName,

                        'middle_name' => $middleName,

                        'last_name' => $lastName,

                        'email' => strtolower(trim($email)),

                        'password' => Hash::make('123456'),

                        'role' => 'teacher',

                        'phone_number' => $phoneNumber,

                        'id_number' => $idNumber,
                    ]);

                    /*
                    |--------------------------------------------------------------------------
                    | Create Teacher
                    |--------------------------------------------------------------------------
                    */

                    Teacher::create([

                        'user_id' => $user->id,

                        'id_number' => $idNumber,

                        'kra_pin' => $kraPin,

                        'gender' => $gender,

                        'dob' => $formattedDob,

                        'tsc_number' => $tscNumber,

                        'school_id' => $school->id,

                        'ippd_number' => $ippdNumber,

                        'date_of_first_appointment' => $formattedAppointmentDate,

                        'terms_of_engagement' => $terms,

                        'pwd_status' => $pwdStatus,

                        'disability_type' => $pwdType,

                        'pwd_number' => $pwdNumber,

                        'ward_id' => $ward ? $ward->id : null,
                        'retirement_date' => $retirementDate,
                    ]);

                    $imported++;

                    if ($imported % 100 == 0) {

                        $this->info("Imported {$imported} teachers...");
                    }

                } catch (\Exception $e) {

                    $skipped++;

                    Log::error(
                        "Teacher import failed at row {$index}: " .
                        $e->getMessage()
                    );

                    $this->error("Error at row {$index}");
                }
            }

            $this->info("Teachers import completed.");

            $this->info("Imported: {$imported}");

            $this->info("Skipped: {$skipped}");

            return Command::SUCCESS;

        } catch (\Exception $e) {

            Log::error('Teacher Import Error: ' . $e->getMessage());

            $this->error($e->getMessage());

            return Command::FAILURE;
        }
    }

    /**
     * Clean and format text
     */
    private function cleanText($value)
    {
        if (!$value) {
            return null;
        }

        $value = trim((string)$value);

        if ($value === '') {
            return null;
        }

        return Str::title(strtolower($value));
    }
}