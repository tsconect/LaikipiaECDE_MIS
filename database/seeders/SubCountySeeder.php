<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\SubCounty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // read the json file from /public/org_units/subcounties.json
        $json = file_get_contents(base_path('public/org_units/subcounties.json'));
        $json = json_decode($json, true);
        foreach ($json as $key => $value)
        {
            foreach($value as $sub_county)
            {
                $parent = $sub_county['parent'];
                // check if the parent county exists
                $county = County::where('id', $parent['id'])->first();
                if(!$county)
                {
                    continue;
                }
                // check if a sub_county with the same id, name or code exists
                $exists = SubCounty::where('id', $sub_county['id'])
                    ->orWhere('name', $sub_county['name'])
                    ->orWhere('code', $sub_county['code'])
                    ->first();
                if($exists)
                {
                    continue;
                }
                // insert each sub_county into the sub_counties table
                $newSubCounty = new SubCounty();
                $newSubCounty->id = $sub_county['id'];
                $newSubCounty->name = $sub_county['name'];
                $newSubCounty->code = $sub_county['code'];
                $newSubCounty->county_id = $parent['id'];
                $newSubCounty->save();
            }
        }
    }
}
