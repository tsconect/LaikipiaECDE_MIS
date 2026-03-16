<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\VTCTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VTCTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        VTCTeacher::create([
            'full_names' => "Nancy Muthoni Kawera",
            'email' => "nmk@mail.com",
            'phone_number' => '0720344918' ,
            'id_number' => "20344918",
            'gender' => "female",
            'dob' => "1997-10-2",
            'tsc_number' => "tsc-20344918",
            'religion'=> "christian",
            'passport_photo_attachment' => "kmdofm.png",
            'constituency_id' => 1,
            'ward_id' => 1,
            'sublocation_id'=> 1,
            'village' => "kathueni",
            'school_id' => 1,
            'union_id' => 1 ,
            'education_level' => "diploma",
            'certification_attachment' => "dip.pdf",
            'next_of_kin_full_names' => "Paul" ,
            'next_of_kin_id_number' => 'mwaniki',
            'next_of_kin_phone_number' => "0774747474",
            'next_of_kin_relationship' => "Spouse",
            'next_of_kin_gender' => "Male" ,
            "kra_pin" =>"kra-wertyuikl"
        ]);


    }
}
