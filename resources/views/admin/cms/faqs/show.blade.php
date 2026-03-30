@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="prof-header">
    <div>
        <div class="prof-header-title">FAQ</div>
        <div class="prof-header-meta">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg> Order: {{ $faq->order ?? '—' }}</span>
            <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg> {{ ucfirst($faq->status) }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.cms.faqs.edit', $faq->id) }}" class="btn btn-success btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M16.862 3.487a2.5 2.5 0 013.535 3.535l-10.61 10.61a2 2 0 01-.707.464l-4.243 1.414a.5.5 0 01-.632-.632l1.414-4.243a2 2 0 01.464-.707l10.61-10.61zm2.121 2.121a.5.5 0 00-.707 0l-1.414 1.414 2.121 2.121 1.414-1.414a.5.5 0 000-.707l-1.414-1.414zm-2.828 2.828L6.293 17.298l-1.06 3.182 3.182-1.06 9.862-9.862-2.121-2.121z"></path></svg> Edit
        </a>
        <a href="{{ route('admin.cms.faqs.index') }}" class="btn btn-secondary btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg> Back
        </a>
    </div>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-question-circle"></i> Question</div>
                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16h.01M12 12a2 2 0 10-2-2 2 2 0 002 2zm0 0v2"/></svg> Question</div>
                <div class="detail-value">{{ $faq->question }}</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-chat-text"></i> Answer</div>
                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10zm-2 0V5H5v13.17L7.17 17H19z"></path></svg> Answer</div>
                <div class="detail-value">{{ $faq->answer }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-sort-numeric-up"></i> Order</div>
                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><text x="4" y="20" font-size="16">#</text></svg> Order</div>
                <div class="detail-value">{{ $faq->order ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-toggle-on"></i> Status</div>
                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><rect x="2" y="8" width="20" height="8" rx="4"/><circle cx="16" cy="12" r="3"/></svg> Status</div>
                <div class="detail-value">{{ ucfirst($faq->status) }}</div>
            </div>

        </div>
    </div>
</div>

@endsection
