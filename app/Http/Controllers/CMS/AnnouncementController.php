<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:manage-cms', ['except' => []]);
    // }

    public function index()
    {
        $announcements = Announcement::orderBy('priority')->paginate(15);
        log_user_activity(0, 'announcements', 'index', 'User accessed the announcements index page', 'admin/cms/announcements');
        return view('admin.cms.announcements.index', compact('announcements'));
    }

    public function create()
    {
        log_user_activity(0, 'announcements', 'create', 'User accessed the announcements create page', 'admin/cms/announcements/create');
        return view('admin.cms.announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->only(['title', 'content', 'priority', 'start_date', 'end_date', 'status']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('announcements', 'public');
        }

        $announcement = Announcement::create($data);

        log_user_activity($announcement->id, 'announcements', 'store', 'User created a new announcement: ' . $announcement->title, url()->current(), json_encode($announcement));

        return redirect()->route('admin.cms.announcements.index')->with('success', 'Announcement created successfully');
    }

    public function edit(Announcement $announcement)
    {
        log_user_activity($announcement->id, 'announcements', 'edit', 'User accessed edit page for announcement: ' . $announcement->title, 'admin/cms/announcements/' . $announcement->id . '/edit', json_encode($announcement));
        return view('admin.cms.announcements.edit', compact('announcement'));
    }

    public function show(Announcement $announcement)
    {
        log_user_activity($announcement->id, 'announcements', 'show', 'User viewed announcement with id ' . $announcement->id, url()->current(), json_encode($announcement));
        return view('admin.cms.announcements.show', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:draft,published'
        ]);

        $current_object = json_encode($announcement);

        $data = $request->only(['title', 'content', 'priority', 'start_date', 'end_date', 'status']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('announcements', 'public');
        }

        $announcement->update($data);

        log_user_activity($announcement->id, 'announcements', 'update', 'User updated announcement with id ' . $announcement->id, url()->current(), json_encode($announcement), $current_object);

        return redirect()->route('admin.cms.announcements.index')->with('success', 'Announcement updated successfully');
    }

    public function destroy(Announcement $announcement)
    {
        $oldAnnouncement = json_encode($announcement);
        $announcementId = $announcement->id;
        $announcement->delete();
        log_user_activity($announcementId, 'announcements', 'destroy', 'User deleted announcement with id ' . $announcementId, url()->current(), null, $oldAnnouncement);
        return redirect()->route('admin.cms.announcements.index')->with('success', 'Announcement deleted successfully');
    }
}
