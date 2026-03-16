<?php

namespace Database\Seeders;

use App\Models\Constituency;
use App\Models\SubLocation;
use App\Models\Wards;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminstrativeUnitsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Constituency
        $_const = Constituency::create([
            "name" => "Timau",
        ]);

        //Wards
        $_ward = Wards::create([
            "constituency_id"  => $_const->id,
            "name" => "Mia Moja",
            "slug" => "Mia Moja"
        ]);

        //SubLocation
        SubLocation::create([
            "ward_id"  => $_ward->id,
            "name" => "Mia Moja",
        ]);


    }
}
