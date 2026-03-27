<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // allow either Admin role or manage-cms permission to access contact messages
        $this->middleware('role_or_permission:Admin|manage-cms', ['except' => []]);
    }

    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.cms.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        return view('admin.cms.contact-messages.show', compact('message'));
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $request->validate([
            'reply' => 'required|string'
        ]);

        $message->update([
            'status' => 'replied',
            'reply' => $request->reply,
            'replied_at' => now()
        ]);

        // TODO: Send email to user

        return redirect()->route('admin.cms.contact-messages.index')->with('success', 'Reply sent successfully');
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['status' => 'closed']);
        return redirect()->route('admin.cms.contact-messages.index')->with('success', 'Message marked as read');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.cms.contact-messages.index')->with('success', 'Message deleted successfully');
    }
}
