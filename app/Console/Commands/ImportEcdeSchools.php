<?php

namespace App\Console\Commands;

use App\Models\EcdeSchool;
use App\Models\EcdeSchools;
use App\Models\SubLocation;
use App\Models\Ward;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportEcdeSchools extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Example:
     * php artisan ecde:import-schools
     */
    protected $signature = 'ecde:import-schools';

    /**
     * The console command description.
     */
    protected $description = 'Import ECDE schools from Excel file';

    public function handle()
    {
        try {

            DB::disableQueryLog();

            $filePath = public_path('org_units/nanyuki_ecde_schools.json');

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

            foreach ($rows as $index => $row) {

                try {

                    $schoolName = $this->cleanText($row['School/Center Name'] ?? null);
                    $centerCode = $this->cleanText($row['School/Center Code'] ?? null);
                    $wardID = $this->cleanText($row['Ward'] ?? null);
                    $subLocationName = $this->cleanText($row['Sub-Location'] ?? null);
                    $regNumber = $this->cleanText($row['Registration Number(if registered)'] ?? null);
                    $feederSchool = $this->cleanText($row['Feeder School'] ?? null);
                    $remarks = $this->cleanText($row['Remarks'] ?? null);

                    // Skip empty rows
                    if (empty($schoolName)) {

                        Log::info("Skipping empty row at index {$index}");

                        continue;
                    }

                    // Prevent duplicates
                    $existingSchool = EcdeSchools::whereRaw('LOWER(school_name) = ?', [strtolower($schoolName)])
                        // ->orWhere('center_code', $centerCode)
                        ->first();

                    if ($existingSchool) {

                        $skipped++;

                        Log::warning("Duplicate school skipped: {$schoolName}");

                        $this->warn("Duplicate skipped: {$schoolName}");

                        continue;
                    }

                    // Find ward
                    $ward = Ward::where('id', $wardID)->first();

                    if (!$ward) {

                        $skipped++;

                        Log::warning("Skipped school '{$schoolName}' - Ward  id not found: {$wardID}");

                        $this->warn("Ward not found for: {$schoolName}");

                        continue;
                    }

                    // Find sub-location
                    $subLocation = SubLocation::whereRaw('LOWER(name) = ?', [strtolower($subLocationName)])
                        ->first();

                    if (!$subLocation) {

                        $subLocation_id = null;

                        Log::warning("Sub-location not found for '{$schoolName}' : {$subLocationName}");

                    } else {

                        $subLocation_id = $subLocation->id;
                    }

                    // Extract classes info from remarks
                    $numberOfClasses = null;
                    $classRoomStatus = null;


                    EcdeSchools::create([
                        'school_name' => $schoolName,
                        'center_code' => $centerCode,
                        'ward_id' => $wardID,
                        'sub_location_id' => $subLocation_id,
                        'reg_number' => $regNumber,
                        'feeder_school' => strtolower($feederSchool) === 'yes' ? 'Yes' : 'No',
                        'remarks' => $remarks,
                        'number_of_classes' => $numberOfClasses,
                        'class_rooms_status' => $classRoomStatus,
                        'school_location' => $subLocationName,
                    ]);

                    $imported++;

                    if ($imported % 50 == 0) {
                        $this->info("Imported {$imported} schools...");
                    }

                } catch (\Exception $e) {

                    $skipped++;

                    Log::error("Failed importing row {$index}: " . $e->getMessage());

                    $this->error("Error on row {$index}");
                }
            }

            $this->info("Import complete.");
            $this->info("Imported: {$imported}");
            $this->info("Skipped: {$skipped}");

            return Command::SUCCESS;

        } catch (\Exception $e) {

            Log::error('ECDE Import Error: ' . $e->getMessage());

            $this->error($e->getMessage());

            return Command::FAILURE;
        }
    }

    /**
     * Convert to proper case and clean value
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