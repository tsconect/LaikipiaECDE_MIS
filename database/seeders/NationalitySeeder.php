<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Read the JSON file from /public/org_units/citizenship.json and add it to the database
        $json = file_get_contents(base_path('public/org_units/citizenship.json'));
        $json = json_decode($json, true);

        foreach ($json as $key => $value) {
            foreach ($value as $citizenship) {
                $exists = Nationality::where('name', $citizenship['nationality'])->first();
                if ($exists) {
                    continue; 
                }
                
                
                $newCitizenship = new Nationality();
                $newCitizenship->name = $citizenship['nationality']; 
                $newCitizenship->save(); 
                
            }
        }
    }
}
