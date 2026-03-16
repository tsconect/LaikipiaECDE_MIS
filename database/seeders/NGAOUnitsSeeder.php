<?php

namespace Database\Seeders;

use App\Models\NGAOUnits;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NGAOUnitsSeeder extends Seeder
{
    function readCountiesJson()
    {
        # code...
        return json_decode(file_get_contents(storage_path() . '/org_units/counties.json'), true);
    }

    function readWardsJson()
    {
        # code...
        return json_decode(file_get_contents(storage_path() . '/org_units/wards.json'), true);
    }

    function readSubCountiesJson()
    {
        # code...
        return json_decode(file_get_contents(storage_path() . '/org_units/subcounties.json'), true);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // National Government Adminstrative Seeders ...

        foreach ($this->readCountiesJson()['organisationUnits'] as $_county) {

            NGAOUnits::create([
                'code' => $_county['code'],
                'name' => $_county['name'],
                'org_id' => $_county['id'],
                'parent_id' => $_county['parent']['id'],
                'level_id' => 2
            ]);
        }

        foreach ($this->readSubCountiesJson()['organisationUnits'] as $_county) {
            NGAOUnits::create([
                'code' => $_county['code'],
                'name' => $_county['name'],
                'org_id' => $_county['id'],
                'parent_id' => $_county['parent']['id'],
                'level_id' => 3
            ]);
        }

        foreach ($this->readWardsJson()['organisationUnits'] as $_county) {
            NGAOUnits::create([
                'code' => $_county['code'],
                'name' => $_county['name'],
                'org_id' => $_county['id'],
                'parent_id' => $_county['parent']['id'],
                'level_id' => 4
            ]);
        }

    }
}
