<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            "first_name" => "Amdin",
            "last_name" => "l_name",
            "middle_name" => "m_name",
            "email" => "admin@mail.com",
            'role' => 'seeders',
            "password" => Hash::make("admin123"),
        ]);
    }
}
