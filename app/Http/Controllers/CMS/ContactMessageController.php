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
        log_user_activity(0, 'contact_messages', 'index', 'User accessed the contact messages index page', 'admin/cms/contact-messages');
        return view('admin.cms.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        log_user_activity($message->id, 'contact_messages', 'show', 'User viewed contact message with id ' . $message->id, url()->current(), json_encode($message));
        return view('admin.cms.contact-messages.show', compact('message'));
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $request->validate([
            'reply' => 'required|string'
        ]);

        $current_object = json_encode($message);

        $message->update([
            'status' => 'replied',
            'reply' => $request->reply,
            'replied_at' => now()
        ]);

        log_user_activity($message->id, 'contact_messages', 'update', 'User replied to contact message with id ' . $message->id, url()->current(), json_encode($message), $current_object);

        // TODO: Send email to user

        return redirect()->route('admin.cms.contact-messages.index')->with('success', 'Reply sent successfully');
    }

    public function markAsRead(ContactMessage $message)
    {
        $current_object = json_encode($message);
        $message->update(['status' => 'closed']);
        log_user_activity($message->id, 'contact_messages', 'update', 'User marked contact message with id ' . $message->id . ' as read', url()->current(), json_encode($message), $current_object);
        return redirect()->route('admin.cms.contact-messages.index')->with('success', 'Message marked as read');
    }

    public function destroy(ContactMessage $message)
    {
        $oldMessage = json_encode($message);
        $messageId = $message->id;
        $message->delete();
        log_user_activity($messageId, 'contact_messages', 'destroy', 'User deleted contact message with id ' . $messageId, url()->current(), null, $oldMessage);
        return redirect()->route('admin.cms.contact-messages.index')->with('success', 'Message deleted successfully');
    }
}
