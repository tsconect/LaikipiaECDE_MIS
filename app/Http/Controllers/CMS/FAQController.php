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
        $faqs = FAQ::paginate(15);
        return view('admin.cms.faqs.index', compact('faqs'));
    }

    public function create()
    {
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

        FAQ::create($data);

        return redirect()->route('admin.cms.faqs.index')->with('success', 'FAQ created successfully');
    }

    public function edit(FAQ $faq)
    {
        return view('admin.cms.faqs.edit', compact('faq'));
    }

    public function show(FAQ $faq)
    {
        return view('admin.cms.faqs.edit', compact('faq'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'status' => 'required|in:draft,published',
            'order' => 'nullable|integer|min:0'
        ]);

        $data = $request->only(['question', 'answer', 'status', 'order']);
        $data['order'] = $request->filled('order') ? (int) $request->input('order') : $faq->order;

        $faq->update($data);

        return redirect()->route('admin.cms.faqs.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('admin.cms.faqs.index')->with('success', 'FAQ deleted successfully');
    }
}
