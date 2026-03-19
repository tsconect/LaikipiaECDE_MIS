<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        Testimonial::create([
            'name' => 'John Doe',
            'position' => 'School Principal',
            'message' => 'The Laikipia ECDE Management System has significantly improved our administrative efficiency.',
            'image' => null,
            'rating' => 5,
            'organization' => 'Laikipia Primary School',
            'status' => 'approved',
            'order' => 1
        ]);

        Testimonial::create([
            'name' => 'Jane Smith',
            'position' => 'County Education Officer',
            'message' => 'An excellent platform for managing ECDE programs across the county.',
            'image' => null,
            'rating' => 5,
            'organization' => 'Laikipia County',
            'status' => 'approved',
            'order' => 2
        ]);

        Testimonial::create([
            'name' => 'Peter Kipchoge',
            'position' => 'ECDE Coordinator',
            'message' => 'User-friendly and very reliable. Highly recommended!',
            'image' => null,
            'rating' => 4,
            'organization' => 'Ward ECDE Unit',
            'status' => 'approved',
            'order' => 3
        ]);
    }
}
