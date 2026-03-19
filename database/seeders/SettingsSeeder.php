<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Settings::create([
            'key' => 'site_name',
            'value' => 'Laikipia ECDE Management System',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'site_logo',
            'value' => '/assets/images/laikipia.png',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'contact_email',
            'value' => 'info@laikipia-ecde.go.ke',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'contact_phone',
            'value' => '+254-XXX-XXXXXX',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'contact_address',
            'value' => 'Nanyuki, Laikipia County, Kenya',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'social_facebook',
            'value' => 'https://facebook.com/laikipia-ecde',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'social_twitter',
            'value' => 'https://twitter.com/laikipia_ecde',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'social_instagram',
            'value' => 'https://instagram.com/laikipia_ecde',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'items_per_page',
            'value' => '15',
            'type' => 'string'
        ]);

        Settings::create([
            'key' => 'enable_comments',
            'value' => '1',
            'type' => 'boolean'
        ]);
    }
}
