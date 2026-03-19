<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::updateOrCreate([
            'email' => 'admin@mail.com',
        ], [
            "first_name" => "Amdin",
            "last_name" => "l_name",
            "middle_name" => "m_name",
            'role' => 'seeders',
            "password" => Hash::make("admin123"),
        ]);

        $permission = Permission::findOrCreate('manage-cms', 'web');
        $admin->givePermissionTo($permission);
    }
}
