<?php

namespace App\Http\Controllers;

use App\Models\BursaryApplications;
use App\Models\Constituency;
use App\Models\EcdeSchools;
use App\Models\Post;
use App\Models\Announcement;
use App\Models\Testimonial;
use App\Models\Settings;
use App\Models\Teacher;
use App\Models\Ward;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    function index(Request $request){
        $applications=BursaryApplications::get();

        $constituencies = Constituency::all();
        $wards = Ward::all();
        $ecde_schools = EcdeSchools::all();

        $recentPosts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $activeAnnouncements = Announcement::where('status', 'published')
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->orderBy('priority', 'desc')
            ->orderBy('start_date', 'desc')
            ->limit(3)
            ->get();

        $featuredTestimonials = Testimonial::where('status', 'published')
            ->orderBy('order')
            ->limit(3)
            ->get();

        $totalEcdeCentres = $ecde_schools->count();
        $totalLearners = $ecde_schools->sum(function ($school) {
            return (int) preg_replace('/[^0-9]/', '', (string) ($school->number_of_students ?? 0));
        });
        $totalTeachers = Teacher::count();
        $totalSubCounties = $ecde_schools->pluck('subcounty_id')->filter()->unique()->count();

        if ($totalSubCounties === 0) {
            $totalSubCounties = $constituencies->count();
        }

        $settings = Settings::all()->pluck('value', 'key')->toArray();

        return view('welcome',compact(
            'applications',
            'constituencies',
            'wards',
            'ecde_schools',
            'recentPosts',
            'activeAnnouncements',
            'featuredTestimonials',
            'settings',
            'totalEcdeCentres',
            'totalLearners',
            'totalTeachers',
            'totalSubCounties'
        ));
    }
}
