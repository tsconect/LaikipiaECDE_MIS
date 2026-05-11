<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            $isAdminRole = strtolower((string) ($user->role ?? '')) === 'admin' || ($user->hasRole('admin') ?? false);
            $canManageCms = $user->can('manage-cms');

            if (!$isAdminRole && !$canManageCms) {
                abort(403, 'User does not have the right permissions.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $faqs = FAQ::paginate(15);
        log_user_activity(0, 'faqs', 'index', 'User accessed the FAQs index page', 'admin/cms/faqs');
        return view('admin.cms.faqs.index', compact('faqs'));
    }

    public function create()
    {
        log_user_activity(0, 'faqs', 'create', 'User accessed the FAQs create page', 'admin/cms/faqs/create');
        return view('admin.cms.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'status' => 'nullable|in:draft,published',
            'order' => 'nullable|integer|min:0'
        ]);

        $data = $request->only(['question', 'answer', 'status', 'order']);
        $data['status'] = $request->input('status', 'published');
        $data['order'] = $request->filled('order') ? (int) $request->input('order') : ((FAQ::max('order') ?? 0) + 1);

        $faq = FAQ::create($data);

        log_user_activity($faq->id, 'faqs', 'store', 'User created a new FAQ: ' . $faq->question, url()->current(), json_encode($faq));

        return redirect()->route('admin.cms.faqs.index')->with('success', 'FAQ created successfully');
    }

    public function edit(FAQ $faq)
    {
        log_user_activity($faq->id, 'faqs', 'edit', 'User accessed edit page for FAQ: ' . $faq->question, 'admin/cms/faqs/' . $faq->id . '/edit', json_encode($faq));
        return view('admin.cms.faqs.edit', compact('faq'));
    }

    public function show(FAQ $faq)
    {
        log_user_activity($faq->id, 'faqs', 'show', 'User viewed FAQ with id ' . $faq->id, url()->current(), json_encode($faq));
        return view('admin.cms.faqs.show', compact('faq'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'status' => 'required|in:draft,published',
            'order' => 'nullable|integer|min:0'
        ]);

        $current_object = json_encode($faq);

        $data = $request->only(['question', 'answer', 'status', 'order']);
        $data['order'] = $request->filled('order') ? (int) $request->input('order') : $faq->order;

        $faq->update($data);

        log_user_activity($faq->id, 'faqs', 'update', 'User updated FAQ with id ' . $faq->id, url()->current(), json_encode($faq), $current_object);

        return redirect()->route('admin.cms.faqs.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy(FAQ $faq)
    {
        $oldFaq = json_encode($faq);
        $faqId = $faq->id;
        $faq->delete();
        log_user_activity($faqId, 'faqs', 'destroy', 'User deleted FAQ with id ' . $faqId, url()->current(), null, $oldFaq);
        return redirect()->route('admin.cms.faqs.index')->with('success', 'FAQ deleted successfully');
    }
}
