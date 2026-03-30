<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\BursaryApplications;
use App\Models\Constituency;
use App\Models\ContactMessage;
use App\Models\EcdeSchools;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Post;
use App\Models\Settings;
use App\Models\Teacher;
use App\Models\Testimonial;
use App\Models\Ward;
use Illuminate\Http\Request;

class WebController extends Controller
{
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

        return view('web.index',compact(
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

    
     public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('web.pages.show', compact('page'));
    }

    // Posts/Blog
    public function posts(Request $request)
    {
        $query = Post::where('status', 'published')->orderBy('published_at', 'desc');
        
        $posts = $query->paginate(10);
        $recentPosts = Post::where('status', 'published')->orderBy('published_at', 'desc')->limit(5)->get();
        
        return view('web.blog.index', compact('posts', 'recentPosts'));
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $post->increment('views_count');
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();
        return view('web.blog.show', compact('post', 'relatedPosts'));
    }

    // Galleries
    public function galleries()
    {
        $galleries = Gallery::where('status', 'published')->paginate(12);
        $totalGalleries = Gallery::where('status', 'published')->count();
        return view('web.galleries.index', compact('galleries', 'totalGalleries'));
    }

    public function showGallery($slug)
    {
        $gallery = Gallery::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('web.galleries.show', compact('gallery'));
    }

    // FAQs
    public function faqs()
    {
        $faqs = FAQ::where('status', 'published')
            ->orderBy('order')
            ->get();
        return view('web.faqs.index', compact('faqs'));
    }

    // Testimonials
    public function testimonials()
    {
        $testimonials = Testimonial::where('status', 'published')
            ->orderBy('order')
            ->get();
        return view('web.testimonials', compact('testimonials'));
    }

    // Announcements
    public function announcements()
    {
        $announcements = Announcement::where('status', 'published')
            ->where(function ($query) {
                $query->whereDate('start_date', '<=', now())
                    ->whereDate('end_date', '>=', now());
            })
            ->orderBy('priority', 'desc')
            ->orderBy('start_date', 'desc')
            ->paginate(10);
        
        $totalAnnouncements = Announcement::where('status', 'published')
            ->where(function ($query) {
                $query->whereDate('start_date', '<=', now())
                    ->whereDate('end_date', '>=', now());
            })
            ->count();
        
        return view('web.announcements', compact('announcements', 'totalAnnouncements'));
    }

    public function showAnnouncement($id)
    {
        $announcement = Announcement::where('id', $id)->where('status', 'published')->firstOrFail();
        return view('web.announcements.show', compact('announcement'));
    }

    public function schools()
    {
        $schools = EcdeSchools::latest()->get();

        
        return view('web.schools.index', compact('schools'));
    }

    // Contact Form
    public function contactForm()
    {
        $settings = $this->getSettings();
        return view('web.contact.form', compact('settings'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'new'
        ]);

        // TODO: Send confirmation email

        return redirect()->back()->with('success', 'Your message has been sent successfully. We will get back to you soon.');
    }

    // Helper method to get settings
    private function getSettings()
    {
        $settings = [];
        $settingsRecords = Settings::all();
        
        foreach ($settingsRecords as $setting) {
            $settings[$setting->key] = $setting->value;
        }
        
        return $settings;
    }
}
