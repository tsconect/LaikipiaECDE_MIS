<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            $isAdminRole = strtolower((string) ($user->role ?? '')) === 'admin' || (method_exists($user, 'hasRole') && $user->hasRole('admin'));
            $canManageCms = $user->can('manage-cms');

            if (!$isAdminRole && !$canManageCms) {
                abort(403, 'User does not have the right permissions.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $galleries = Gallery::with('creator')->paginate(15);
        log_user_activity(0, 'galleries', 'index', 'User accessed the galleries index page', 'admin/cms/galleries');
        return view('admin.cms.galleries.index', compact('galleries'));
    }

    public function create()
    {
        log_user_activity(0, 'galleries', 'create', 'User accessed the galleries create page', 'admin/cms/galleries/create');
        return view('admin.cms.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:draft,published'
        ]);

        $slug = Str::slug($request->title);

        $gallery = Gallery::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'created_by' => auth()->id(),
            'status' => $request->status
        ]);

        log_user_activity($gallery->id, 'galleries', 'store', 'User created a new gallery: ' . $gallery->title, url()->current(), json_encode($gallery));

        return redirect()->route('admin.cms.galleries.index')->with('success', 'Gallery created successfully');
    }

    public function edit(Gallery $gallery)
    {
        log_user_activity($gallery->id, 'galleries', 'edit', 'User accessed edit page for gallery: ' . $gallery->title, 'admin/cms/galleries/' . $gallery->id . '/edit', json_encode($gallery));
        return view('admin.cms.galleries.edit', compact('gallery'));
    }

    public function show(Gallery $gallery)
    {
        log_user_activity($gallery->id, 'galleries', 'show', 'User viewed gallery with id ' . $gallery->id, url()->current(), json_encode($gallery));
        return view('admin.cms.galleries.show', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:draft,published'
        ]);

        $current_object = json_encode($gallery);

        $gallery->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'status' => $request->status
        ]);

        log_user_activity($gallery->id, 'galleries', 'update', 'User updated gallery with id ' . $gallery->id, url()->current(), json_encode($gallery), $current_object);

        return redirect()->route('admin.cms.galleries.index')->with('success', 'Gallery updated successfully');
    }

    public function destroy(Gallery $gallery)
    {
        $oldGallery = json_encode($gallery);
        $galleryId = $gallery->id;
        $gallery->images()->delete();
        $gallery->delete();
        log_user_activity($galleryId, 'galleries', 'destroy', 'User deleted gallery with id ' . $galleryId, url()->current(), null, $oldGallery);
        return redirect()->route('admin.cms.galleries.index')->with('success', 'Gallery deleted successfully');
    }

    public function uploadImages(Request $request, Gallery $gallery)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => $image->store('galleries', 'public'),
                    'caption' => $request->input("captions.$index"),
                    'order' => $index + 1
                ]);
            }
        }

        return redirect()->route('admin.cms.galleries.edit', $gallery)->with('success', 'Images uploaded successfully');
    }

    public function deleteImage(GalleryImage $image)
    {
        $gallery = $image->gallery;
        $image->delete();
        return redirect()->route('admin.cms.galleries.edit', $gallery)->with('success', 'Image deleted successfully');
    }
}
