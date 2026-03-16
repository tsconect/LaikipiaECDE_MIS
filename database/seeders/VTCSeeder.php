<?php

namespace Database\Seeders;

use App\Models\VTC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VTCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        VTC::create([
            'name' => "Ruaraka VTC",
            'registration_number' => "rk-vtc-2039",
            "area_in_hectares" => ".5",
            'legal_ownership' => "public land",
            'infrastracture' => "...",
            // School contact person Name
            'designation' => "Head master",
            'full_names' => "Paul K Mwaniki",
            'id_number' => "85525255",
            'kra_pin' => "tffytguio",
            'phone_number' => "720344918",
            'tsc_number' => "2036510-tsc",
            'p_o_box' => "ruaraka-001",
        ]);
    }
}
