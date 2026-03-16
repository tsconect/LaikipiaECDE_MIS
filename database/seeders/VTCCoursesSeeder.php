<?php

namespace Database\Seeders;

use App\Models\VTCCourses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VTCCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        VTCCourses::create([
            "vtc_id" => "1",
            "vtc_dpt_id" => "1",
            'course_name' => "Hair Dressing",
            "duration" => '2 months' ,
            'capacity' => '200' ,
            'registration_code' => 'H1' ,
            'examination_body_or_creteria' => 'KNEC' ,
            'addtional_description' => 'Hair Dressing Cosmotology' ,
        ]);
    }
}
