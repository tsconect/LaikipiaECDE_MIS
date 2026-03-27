@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="prof-header">
    <div>
        <div class="prof-header-title">{{ $testimonial->name }}</div>
        <div class="prof-header-meta">
            <span><i class="bi bi-briefcase"></i> {{ $testimonial->position }}</span>
            @if($testimonial->organization)<span><i class="bi bi-building"></i> {{ $testimonial->organization }}</span>@endif
            <span><i class="bi bi-star-fill"></i> {{ $testimonial->rating }}/5</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.cms.testimonials.edit', $testimonial->id) }}" class="btn btn-success btn-sm">
            <i class="bi bi-pencil-fill"></i> Edit
        </a>
        <a href="{{ route('admin.cms.testimonials.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-person"></i> Name</div>
                <div class="detail-value">{{ $testimonial->name }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-briefcase"></i> Position</div>
                <div class="detail-value">{{ $testimonial->position }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-building"></i> Organization</div>
                <div class="detail-value">{{ $testimonial->organization ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-star"></i> Rating</div>
                <div class="detail-value">{{ $testimonial->rating }}/5</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-toggle-on"></i> Status</div>
                <div class="detail-value">{{ ucfirst($testimonial->status) }}</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-chat-quote"></i> Message</div>
                <div class="detail-value">{{ $testimonial->message }}</div>
            </div>

            @if($testimonial->image)
            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-image"></i> Photo</div>
                <div class="detail-value">
                    <img src="{{ asset('storage/' . $testimonial->image) }}" class="rounded-circle img-thumbnail" style="width:100px;height:100px;object-fit:cover;">
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection
