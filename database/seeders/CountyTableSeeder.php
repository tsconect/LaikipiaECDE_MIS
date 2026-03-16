<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // read the json file from /public/org_units/counties.json
        $json = file_get_contents(base_path('public/org_units/counties.json'));
        $json = json_decode($json, true);
        foreach ($json as $key => $value)
        {
            foreach($value as $county)
            {
                // check if a county with the same id, name or code exists
                $exists = County::where('id', $county['id'])
                    ->orWhere('name', $county['name'])
                    ->orWhere('code', $county['code'])
                    ->first();
                if($exists)
                {
                    continue;
                }
                // insert each county into the counties table
                $newCounty = new County();
                $newCounty->id = $county['id'];
                $newCounty->name = $county['name'];
                $newCounty->code = $county['code'];
                $newCounty->save();
            }
        }
    }
}
