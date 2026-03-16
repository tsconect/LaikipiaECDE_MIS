<?php

namespace Database\Seeders;

use App\Models\Ward;
use App\Models\SubCounty;
use App\Models\Constituency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Read the JSON file
        $json = file_get_contents(base_path('public/org_units/wards.json'));
        $json = json_decode($json, true);

    

        // Initialize counter
        $insertedCount = 0;

        foreach ($json as $key => $value)
        {
            foreach ($value as $ward)
            {
                $parent = $ward['parent'];
                
                // Check if the parent sub_county exists
                $sub_county = Constituency::where('constituency_id', $parent['id'])->first();
                if (!$sub_county)
                {
                    continue;
                }

                
                $exists = Ward::where('id', $ward['id'])
                    ->orWhere('name', $ward['name'])
                    ->orWhere('code', $ward['code'])
                    ->first();
                if ($exists)
                {
                    continue;
                }

               
                $newWard = new Ward();
                $newWard->id = $ward['id'];
                $newWard->name = $ward['name'];
                $newWard->code = $ward['code'];
                $newWard->constituency_id = $parent['id'];
                $newWard->constituency_code = $parent['id'];
                $newWard->ward_code = $ward['id'];
                $newWard->save();
                // Increment counter
                $insertedCount++;
            }
        }

        // Output the number of records inserted
        echo "Total Wards Inserted: " . $insertedCount . PHP_EOL;
    }

}
