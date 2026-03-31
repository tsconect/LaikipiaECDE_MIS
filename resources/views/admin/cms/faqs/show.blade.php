@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="prof-header">
    <div>
        <div class="prof-header-title">FAQ</div>
        <div class="prof-header-meta">
            <span><i class="bi bi-circle"></i> Order: {{ $faq->order ?? '—' }}</span>
            <span><i class="bi bi-circle"></i> {{ ucfirst($faq->status) }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.cms.faqs.edit', $faq->id) }}" class="btn btn-success btn-sm">
            <i class="bi bi-circle"></i> Edit
        </a>
        <a href="{{ route('admin.cms.faqs.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-circle"></i> Back
        </a>
    </div>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-question-circle"></i> Question</div>
                                <div class="detail-label"><i class="bi bi-circle"></i> Question</div>
                <div class="detail-value">{{ $faq->question }}</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-chat-text"></i> Answer</div>
                                <div class="detail-label"><i class="bi bi-circle"></i> Answer</div>
                <div class="detail-value">{{ $faq->answer }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-sort-numeric-up"></i> Order</div>
                                <div class="detail-label"><i class="bi bi-circle"></i> Order</div>
                <div class="detail-value">{{ $faq->order ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-toggle-on"></i> Status</div>
                                <div class="detail-label"><i class="bi bi-circle"></i> Status</div>
                <div class="detail-value">{{ ucfirst($faq->status) }}</div>
            </div>

        </div>
    </div>
</div>

@endsection
