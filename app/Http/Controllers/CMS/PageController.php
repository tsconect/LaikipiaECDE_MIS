<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:manage-cms', ['except' => []]);
    // }

    public function index()
    {
        $pages = Page::paginate(15);
        log_user_activity(0, 'pages', 'index', 'User accessed the pages index page', 'admin/cms/pages');
        return view('admin.cms.pages.index', compact('pages'));
    }

    public function create()
    {
        log_user_activity(0, 'pages', 'create', 'User accessed the pages create page', 'admin/cms/pages/create');
        return view('admin.cms.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'meta_description' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $slug = Str::slug($request->title);

        $data = $request->only(['title', 'content', 'meta_description', 'status']);
        $data['slug'] = $slug;
        $data['created_by'] = auth()->id();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('pages', 'public');
        }

        $page = Page::create($data);

        log_user_activity($page->id, 'pages', 'store', 'User created a new page: ' . $page->title, url()->current(), json_encode($page));

        return redirect()->route('admin.cms.pages.index')->with('success', 'Page created successfully');
    }

    public function edit(Page $page)
    {
        log_user_activity($page->id, 'pages', 'edit', 'User accessed edit page for page: ' . $page->title, 'admin/cms/pages/' . $page->id . '/edit', json_encode($page));
        return view('admin.cms.pages.edit', compact('page'));
    }

    public function show(Page $page)
    {
        log_user_activity($page->id, 'pages', 'show', 'User viewed page with id ' . $page->id, url()->current(), json_encode($page));
        return view('admin.cms.pages.show', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'meta_description' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $current_object = json_encode($page);

        $data = $request->only(['title', 'content', 'meta_description', 'status']);

        if ($request->title !== $page->title) {
            $data['slug'] = Str::slug($request->title);
        }

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('pages', 'public');
        }

        $page->update($data);

        log_user_activity($page->id, 'pages', 'update', 'User updated page with id ' . $page->id, url()->current(), json_encode($page), $current_object);

        return redirect()->route('admin.cms.pages.index')->with('success', 'Page updated successfully');
    }

    public function destroy(Page $page)
    {
        $oldPage = json_encode($page);
        $pageId = $page->id;
        $page->delete();
        log_user_activity($pageId, 'pages', 'destroy', 'User deleted page with id ' . $pageId, url()->current(), null, $oldPage);
        return redirect()->route('admin.cms.pages.index')->with('success', 'Page deleted successfully');
    }
}
