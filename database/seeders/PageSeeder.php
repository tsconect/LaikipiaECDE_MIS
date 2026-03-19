<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title' => 'About Us',
            'slug' => 'about-us',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'meta_description' => 'Learn more about Laikipia ECDE Management System',
            'created_by' => 1,
            'status' => 'published'
        ]);

        Page::create([
            'title' => 'Terms & Conditions',
            'slug' => 'terms-conditions',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'meta_description' => 'Read our terms and conditions',
            'created_by' => 1,
            'status' => 'published'
        ]);

        Page::create([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'meta_description' => 'Our privacy policy',
            'created_by' => 1,
            'status' => 'published'
        ]);
    }
}
