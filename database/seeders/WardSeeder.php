<?php

namespace Database\Seeders;

use App\Models\Ward;
use App\Models\SubCounty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // read the json file from /public/org_units/wards.json
        $json = file_get_contents(base_path('public/org_units/wards.json'));
        $json = json_decode($json, true);
        foreach ($json as $key => $value)
        {
            foreach($value as $ward)
            {
                $parent = $ward['parent'];
                // check if the parent sub_county exists
                $sub_county = SubCounty::where('id', $parent['id'])->first();
                if(!$sub_county)
                {
                    continue;
                }
                // check if a ward with the same id, name or code exists
                $exists = Ward::where('id', $ward['id'])
                    ->orWhere('name', $ward['name'])
                    ->orWhere('code', $ward['code'])
                    ->first();
                if($exists)
                {
                    continue;
                }
                // insert each ward into the wards table
                $newWard = new Ward();
                $newWard->id = $ward['id'];
                $newWard->name = $ward['name'];
                $newWard->code = $ward['code'];
                $newWard->sub_county_id = $parent['id'];
                $newWard->save();
            }
        }
    }
}
