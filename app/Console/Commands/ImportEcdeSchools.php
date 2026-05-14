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
        \Log::info('Starting ECDE schools import...');
        

        
      

        $filePath = public_path('org_units/igwamiti_ecde_schools.xlsx');
      

      

        if (!file_exists($filePath)) {
            $this->error("Excel file not found at: {$filePath}");
            return Command::FAILURE;
        }

        $this->info('Loading Excel file...');

        try {

            DB::disableQueryLog();

            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            if (count($rows) <= 1) {
                $this->error('No data found in Excel.');
                return Command::FAILURE;
            }

            $imported = 0;
            $skipped = 0;

            // Skip header row
            unset($rows[0]);

            foreach ($rows as $index => $row) {

                try {

                    $schoolName = $this->cleanText($row[0] ?? null);
                    $centerCode = $this->cleanText($row[1] ?? null);
                    $wardName = $this->cleanText($row[2] ?? null);
                    $subLocationName = $this->cleanText($row[3] ?? null);
                    $regNumber = $this->cleanText($row[4] ?? null);
                    $feederSchool = $this->cleanText($row[5] ?? null);
                    $remarks = $this->cleanText($row[6] ?? null);

                    // Skip empty rows
                    if (empty($schoolName)) {
                        \Log::info("Skipping empty row at index {$index}");
                        continue;
                    }

                    // Prevent duplicates
                    $existingSchool = EcdeSchools::whereRaw('LOWER(school_name) = ?', [strtolower($schoolName)])
                        ->orWhere('center_code', $centerCode)
                        ->first();

                    if ($existingSchool) {

                        $skipped++;

                        Log::warning("Duplicate school skipped: {$schoolName}");

                        $this->warn("Duplicate skipped: {$schoolName}");

                        continue;
                    }

                    // Find ward
                    $ward = Ward::whereRaw('LOWER(name) = ?', [strtolower($wardName)])
                        ->first();

                    if (!$ward) {

                        $skipped++;

                        Log::warning("Skipped school '{$schoolName}' - Ward not found: {$wardName}");

                        $this->warn("Ward not found for: {$schoolName}");

                        continue;
                    }

                    // Find sub-location
                    $subLocation = SubLocation::whereRaw('LOWER(name) = ?', [strtolower($subLocationName)])
                        ->first();

                    if (!$subLocation) {
                        $subLocation_id = null;

                        // $skipped++;

                        // Log::warning("Skipped school '{$schoolName}' - Sub-location not found: {$subLocationName}");

                        // $this->warn("Sub-location not found for: {$schoolName}");

                        // continue;
                    } else {
                        $subLocation_id = $subLocation->id;
                    }

                    // Extract classes info from remarks
                    $numberOfClasses = null;
                    $classRoomStatus = null;

                    if ($remarks) {

                        if (Str::contains(strtolower($remarks), 'one class')) {
                            $numberOfClasses = 1;
                        } elseif (Str::contains(strtolower($remarks), 'two classes')) {
                            $numberOfClasses = 2;
                        } elseif (Str::contains(strtolower($remarks), 'three classes')) {
                            $numberOfClasses = 3;
                        }

                        $classRoomStatus = $remarks;
                    }

                    EcdeSchools::create([
                        'school_name' => $schoolName,
                        'center_code' => $centerCode,
                        'ward_id' => $ward->id,
                        'sub_location_id' => $subLocation_id,
                        'reg_number' => $regNumber,
                        'feeder_school' => strtolower($feederSchool) === 'yes' ? 'Yes' : 'No',
                        'remarks' => $remarks,
                        'number_of_classes' => $numberOfClasses,
                        'class_rooms_status' => $classRoomStatus,
                        'school_location' => $subLocationName,
                    ]);

                    $imported++;

                    $this->info("Imported {$imported} schools...");

                    if ($imported % 50 == 0) {
                        
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