<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(NGAOUnitsSeeder::class);

      
        // $this->call(AdminstrativeUnitsSeeders::class);
        // $this->call(StudentTypeSeeder::class);
        // $this->call(EcdeSchoolSeeder::class);
        // $this->call(VTCSeeder::class);
        // $this->call(VTCDepartmentsSeeder::class);
        // $this->call(VTCCoursesSeeder::class);
        // $this->call(VTCTeacherSeeder::class);
        // $this->call(StudentSeeder::class);
        $this->call([
             CountySeeder::class,
            ConstituencySeeder::class,
            WardSeeder::class,
       
        ]);
          $this->call(UsersSeeders::class);

        // CMS Seeders
        $this->call([
            PageSeeder::class,
            PostSeeder::class,
            GallerySeeder::class,
            TestimonialSeeder::class,
            AnnouncementSeeder::class,
            FAQSeeder::class,
            SettingsSeeder::class,
        ]);

    }
}
