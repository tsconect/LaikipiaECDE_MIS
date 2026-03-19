<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\FAQ;
use App\Models\Testimonial;
use App\Models\Announcement;
use App\Models\ContactMessage;
use App\Models\Settings;
use Illuminate\Http\Request;

class PublicCMSController extends Controller
{
    // Pages
    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('public.pages.show', compact('page'));
    }

    // Posts/Blog
    public function posts(Request $request)
    {
        $query = Post::where('status', 'published')->orderBy('published_at', 'desc');
        
        $posts = $query->paginate(10);
        $recentPosts = Post::where('status', 'published')->orderBy('published_at', 'desc')->limit(5)->get();
        
        return view('public.blog.index', compact('posts', 'recentPosts'));
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
        return view('public.blog.show', compact('post', 'relatedPosts'));
    }

    // Galleries
    public function galleries()
    {
        $galleries = Gallery::where('status', 'published')->paginate(12);
        $totalGalleries = Gallery::where('status', 'published')->count();
        return view('public.galleries.index', compact('galleries', 'totalGalleries'));
    }

    public function showGallery($slug)
    {
        $gallery = Gallery::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('public.galleries.show', compact('gallery'));
    }

    // FAQs
    public function faqs()
    {
        $faqs = FAQ::where('status', 'published')
            ->orderBy('order')
            ->get();
        return view('public.faqs.index', compact('faqs'));
    }

    // Testimonials
    public function testimonials()
    {
        $testimonials = Testimonial::where('status', 'published')
            ->orderBy('order')
            ->get();
        return view('public.testimonials', compact('testimonials'));
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
        
        return view('public.announcements', compact('announcements', 'totalAnnouncements'));
    }

    // Contact Form
    public function contactForm()
    {
        $settings = $this->getSettings();
        return view('public.contact.form', compact('settings'));
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
