<?php

namespace Database\Seeders;

use App\Models\EcdeSchools;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EcdeSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        EcdeSchools::create([
            "school_name" =>  "Kasarani Primary",
            "number_of_classes" => "200",
            "class_rooms_status" => "permanent" ,
            "constituency" =>  1,
            "feeder_id" => 1 ,
            "ward" =>  1,
            "school_contact_first_name" =>  "Paul",
            "school_contact_middle_name" => "Karanja" ,
            "school_contact_last_name" => "Mwaniki" ,
            "school_contact_designation" =>  "Head Teacher",
            "school_contact_tsc_number" => "wertyuio-tsc" ,
            "school_contact_id_number" => "46516" ,
            "school_contact_phone_number" => "0720344918"  ,
            "school_contact_gender" =>  "male",
            "number_of_students" => "5216" ,
            // "number_of_teachers" => "261" ,
            "remarks" => "Built on pblic land"
        ]);

    }
}
