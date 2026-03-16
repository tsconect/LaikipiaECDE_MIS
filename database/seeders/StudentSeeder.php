<?php

namespace Database\Seeders;

use App\Models\Students;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_user =  User::create([
            "first_name" => "Paul",
            "middle_name" => "Paul",
            "last_name" => "Mwerwa",
            "email" => "PaulPaul@mail.com",
            'role' => 'student',
            "password" => Hash::make("student"),
        ]);


        //ecde
        Students::create([
            'user_id'=> $_user->id,
            'student_type_id' => 1,
            // 'plwd_number' ,
            // 'name' => "Aki",
            'dob' =>  "1998-10-12",
            "identity_number" => "5150350651" ,
            "sublocation_id" => "1",
            "stundent_type_id" => "1" ,
            'gender' => "male",
            'village' => "roysa" ,
        ]);

        $_user2 =  User::create([
            "first_name" => "Kevin",
            "middle_name" => "kioko",
            "last_name" => "Kevin",
            "email" => "KevinKevin@mail.com",
            'role' => 'student',
            "password" => Hash::make("student"),
        ]);

        //vtc
        Students::create([
            'user_id'=> $_user2->id,
            'student_type_id' => 2,
            // 'plwd_number' ,
            // 'name' => $_user2->first_name . " " . $_user2->last_name . " " . $_user2->last_name ,
            'dob' =>  "1998-10-12",
            "identity_number" => "5150350651" ,
            "sublocation_id" => "1",
            "stundent_type_id" => "2" ,
            'gender' => "male",
            'village' => "roysa" ,
        ]);

    }
}
