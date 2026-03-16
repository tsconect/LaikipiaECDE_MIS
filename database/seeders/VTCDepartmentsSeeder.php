<?php

namespace Database\Seeders;

use App\Models\VTCDepartments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VTCDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        VTCDepartments::create([
            'vtc_id' => "1" ,
            'department_name' => "Cosmotology",
            'capacity' => "300",
            'additional_description' => "Deparment of cosmotology",
        ]);
    }
}
