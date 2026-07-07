<?php

namespace App\Console\Commands;

use App\Models\EcdeSchools;
use App\Models\Learner;
use App\Models\SubLocation;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImportEcdeLearners extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'ecde:import-learners';

    /**
     * The console command description.
     */
    protected $description = 'Import ECDE learners from JSON file';

    public function handle()
    {
        try {

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            DB::disableQueryLog();

            $defaultWardId = 1; // CHANGE THIS

            $filePath = public_path('org_units/nanyuki_ecde_learners.json');

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

            $this->info('Starting learner import...');

            foreach ($rows as $index => $row) {

                try {

                    $firstName = $this->cleanText($row['First Name'] ?? null);
                    $middleName = $this->cleanText($row['Middle Name'] ?? null);
                    $lastName = $this->cleanText($row['Last Name'] ?? null);

                    $birthCertificate = $this->cleanText($row['Birth Certificate Number'] ?? null);

                    $nationality = $this->cleanText($row['Nationality'] ?? null);

                    $pwdStatus = $this->cleanText($row['PWD Status'] ?? null);

                    $pwdType = $this->cleanText($row['PWD Type '] ?? null);

                    $pwdNumber = $this->cleanText($row['PWD Number'] ?? null);

                    $gender = $this->cleanText($row['Gender'] ?? null);

                    $subLocationName = $this->cleanText($row['Sub-Location '] ?? null);

                    $villageName = $this->cleanText($row['Village'] ?? null);

                    $admissionNumber = $this->cleanText($row['Admisssion Number'] ?? null);

                    $class = $this->cleanText($row['Class'] ?? null);

                    $schoolName = $this->cleanText($row['School'] ?? null);

                    $parentalStatus = $this->cleanText($row['Parent Details Cleaned'] ?? null);

                     $school = EcdeSchools::whereRaw('LOWER(school_name) = ?', [
                        strtolower($schoolName)
                    ])->first();

                    if (!$school) {

                        $skipped++;

                        Log::warning("School not found for learner {$index}: {$firstName} {$lastName}: {$schoolName}");

                        continue;
                    } else{
                        continue;
                    }

                    // Skip empty rows
                    if (!$firstName) {

                        Log::warning("Skipping empty learner row {$index}");

                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Prevent Duplicates
                    |--------------------------------------------------------------------------
                    */

                    // $existingLearner = Learner::where(function ($query) use (
                    //     $firstName,
                    //     $middleName,
                    //     $lastName,
                    //     $birthCertificate,
                    //     $admissionNumber
                    // ) {

                    //     $query->where(function ($q) use ($firstName, $middleName, $lastName) {

                    //         $q->whereRaw('LOWER(first_name) = ?', [strtolower($firstName)])
                    //             ->whereRaw('LOWER(last_name) = ?', [strtolower($lastName)]);

                    //         if ($middleName) {
                    //             $q->whereRaw('LOWER(middle_name) = ?', [strtolower($middleName)]);
                    //         }
                    //     });

                    //     if ($birthCertificate) {
                    //         $query->orWhere('birth_certificate_number', $birthCertificate);
                    //     }

                    //     if ($admissionNumber) {
                    //         $query->orWhere('admission_number', $admissionNumber);
                    //     }

                    // })->first();

                    // if ($existingLearner) {

                    //     $skipped++;

                    //     Log::warning("Duplicate learner skipped: {$firstName} {$lastName}");

                    //     continue;
                    // }

                    /*
                    |--------------------------------------------------------------------------
                    | School
                    |--------------------------------------------------------------------------
                    */

                   

                    /*
                    |--------------------------------------------------------------------------
                    | Sub Location
                    |--------------------------------------------------------------------------
                    */

                    $subLocation = null;

                    if ($subLocationName) {

                        $subLocation = SubLocation::whereRaw('LOWER(name) = ?', [
                            strtolower($subLocationName)
                        ])->first();
                    }

                    $subLocationId = $subLocation ? $subLocation->id : null;

                    /*
                    |--------------------------------------------------------------------------
                    | Village
                    |--------------------------------------------------------------------------
                    */

                    $village = null;

                    if ($villageName) {

                        $village = Village::whereRaw('LOWER(name) = ?', [
                            strtolower($villageName)
                        ])->first();
                    } else {
                        $village = new Village();
                        $village->name = $villageName;
                        $village->sub_location_id = $subLocationId;
                        $village->save();
                    }

                    $villageId = $village ? $village->id : null;

                    /*
                    |--------------------------------------------------------------------------
                    | Dates
                    |--------------------------------------------------------------------------
                    */
                    $dob = null;

                    if (!empty($row['Date of Birth(mm/dd/yyyy)'])) {

                        $value = $row['Date of Birth(mm/dd/yyyy)'];

                        try {

                            // If it's a timestamp in milliseconds
                            if (is_numeric($value)) {

                                $dob = Carbon::createFromTimestampMs($value)
                                    ->format('Y-m-d');

                            } else {

                                // Handle string dates like 23/3/2022
                                $value = trim($value);

                                // Try d/m/Y first
                                try {
                                    $dob = Carbon::createFromFormat('d/m/Y', $value)
                                        ->format('Y-m-d');

                                } catch (\Exception $e) {

                                    // Try m/d/Y
                                    $dob = Carbon::createFromFormat('m/d/Y', $value)
                                        ->format('Y-m-d');
                                }
                            }

                        } catch (\Exception $e) {

                            $dob = null;
                        }
                    }

               
                    $admissionDate = null;

                    if (!empty($row['Date of Admission'])) {

                        $admissionDate = Carbon::createFromTimestampMs(
                            $row['Date of Admission']
                        )->format('Y-m-d');
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Save Learner
                    |--------------------------------------------------------------------------
                    */

                    Learner::create([

                        'first_name' => $firstName,
                        'middle_name' => $middleName,
                        'last_name' => $lastName,

                        'birth_certificate_number' => $birthCertificate,

                        'pwd_status' => $pwdStatus,
                        'disability_type' => $pwdType,
                        'pwd_number' => $pwdNumber,

                        'dob' => $dob,

                        'gender' => $gender,

                        'sub_location_id' => $subLocationId,

                        'village' => $villageName,
                        'village_id' => $villageId,

                        'school_id' => $school->id,

                        'class' => $class,

                        'date_of_admission' => $admissionDate,

                        'nationality' => $nationality,

                        'admission_number' => $admissionNumber,

                        'ward_id' => $defaultWardId,

                        'parental_status' => $parentalStatus,
                    ]);

                    $imported++;

                    if ($imported % 100 == 0) {
                        $this->info("Imported {$imported} learners...");
                    }

                } catch (\Exception $e) {

                    $skipped++;

                    Log::error("Failed learner import at row {$index}: " . $e->getMessage());

                    $this->error("Error at row {$index}");
                }
            }

            $this->info("Learner import complete.");
            $this->info("Imported: {$imported}");
            $this->info("Skipped: {$skipped}");

            return Command::SUCCESS;

        } catch (\Exception $e) {

            Log::error('Learner Import Error: ' . $e->getMessage());

            $this->error($e->getMessage());

            return Command::FAILURE;
        }
    }

    /**
     * Clean text values
     */
    private function cleanText($value)
    {
        if (!$value) {
            return null;
        }

        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return Str::title(strtolower($value));
    }
}