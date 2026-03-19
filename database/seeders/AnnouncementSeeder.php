<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        Announcement::create([
            'title' => 'System Maintenance',
            'content' => 'The system will be down for maintenance on Sunday from 10 PM to 12 AM.',
            'image' => null,
            'priority' => 1,
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'status' => 'published'
        ]);

        Announcement::create([
            'title' => 'Bursary Applications Open',
            'content' => 'Bursary applications for the 2026 academic year are now open. Apply before the deadline!',
            'image' => null,
            'priority' => 2,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'status' => 'published'
        ]);

        Announcement::create([
            'title' => 'New Features Released',
            'content' => 'Check out our latest features for better management of schools and teachers.',
            'image' => null,
            'priority' => 3,
            'start_date' => now(),
            'end_date' => now()->addDays(14),
            'status' => 'published'
        ]);
    }
}
