<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $gallery1 = Gallery::create([
            'title' => 'School Events 2026',
            'slug' => 'school-events-2026',
            'description' => 'Photos from various school events throughout 2026',
            'created_by' => 1,
            'status' => 'published'
        ]);

        GalleryImage::create([
            'gallery_id' => $gallery1->id,
            'image_path' => '/images/placeholder-1.jpg',
            'caption' => 'School Opening Ceremony',
            'order' => 1
        ]);

        GalleryImage::create([
            'gallery_id' => $gallery1->id,
            'image_path' => '/images/placeholder-2.jpg',
            'caption' => 'Sports Day',
            'order' => 2
        ]);

        GalleryImage::create([
            'gallery_id' => $gallery1->id,
            'image_path' => '/images/placeholder-3.jpg',
            'caption' => 'Academic Excellence Awards',
            'order' => 3
        ]);

        $gallery2 = Gallery::create([
            'title' => 'ECDE Programs',
            'slug' => 'ecde-programs',
            'description' => 'Photos showcasing our ECDE programs and activities',
            'created_by' => 1,
            'status' => 'published'
        ]);

        GalleryImage::create([
            'gallery_id' => $gallery2->id,
            'image_path' => '/images/placeholder-4.jpg',
            'caption' => 'Classroom Activities',
            'order' => 1
        ]);

        GalleryImage::create([
            'gallery_id' => $gallery2->id,
            'image_path' => '/images/placeholder-5.jpg',
            'caption' => 'Play Time',
            'order' => 2
        ]);
    }
}
