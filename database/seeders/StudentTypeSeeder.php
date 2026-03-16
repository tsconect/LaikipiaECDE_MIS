<?php

namespace Database\Seeders;

use App\Models\StudentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ecde
        StudentType::create([
            "student_type_name" => 'ecde'
        ]);

        //vtc
        StudentType::create([
            "student_type_name" => 'vtc'
        ]);

    }
}
