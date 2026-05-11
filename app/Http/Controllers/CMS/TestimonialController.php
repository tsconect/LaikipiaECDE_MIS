<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:manage-cms', ['except' => []]);
    // }

    public function index()
    {
        $testimonials = Testimonial::paginate(15);
        log_user_activity(0, 'testimonials', 'index', 'User accessed the testimonials index page', 'admin/cms/testimonials');
        return view('admin.cms.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        log_user_activity(0, 'testimonials', 'create', 'User accessed the testimonials create page', 'admin/cms/testimonials/create');
        return view('admin.cms.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'message' => 'required|string',
            'organization' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:draft,published'
        ]);

        $data = $request->only(['name', 'position', 'message', 'organization', 'rating', 'status']);
        $data['status'] = $request->input('status', 'published');
        $data['order'] = (Testimonial::max('order') ?? 0) + 1;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial = Testimonial::create($data);

        log_user_activity($testimonial->id, 'testimonials', 'store', 'User created a new testimonial: ' . $testimonial->name, url()->current(), json_encode($testimonial));

        return redirect()->route('admin.cms.testimonials.index')->with('success', 'Testimonial created successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        log_user_activity($testimonial->id, 'testimonials', 'edit', 'User accessed edit page for testimonial: ' . $testimonial->name, 'admin/cms/testimonials/' . $testimonial->id . '/edit', json_encode($testimonial));
        return view('admin.cms.testimonials.edit', compact('testimonial'));
    }

    public function show(Testimonial $testimonial)
    {
        log_user_activity($testimonial->id, 'testimonials', 'show', 'User viewed testimonial with id ' . $testimonial->id, url()->current(), json_encode($testimonial));
        return view('admin.cms.testimonials.show', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'message' => 'required|string',
            'organization' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $current_object = json_encode($testimonial);

        $data = $request->only(['name', 'position', 'message', 'organization', 'rating', 'status']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        log_user_activity($testimonial->id, 'testimonials', 'update', 'User updated testimonial with id ' . $testimonial->id, url()->current(), json_encode($testimonial), $current_object);

        return redirect()->route('admin.cms.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $oldTestimonial = json_encode($testimonial);
        $testimonialId = $testimonial->id;
        $testimonial->delete();
        log_user_activity($testimonialId, 'testimonials', 'destroy', 'User deleted testimonial with id ' . $testimonialId, url()->current(), null, $oldTestimonial);
        return redirect()->route('admin.cms.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
}
