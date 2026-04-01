@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="prof-header">
    <div>
        <div class="prof-header-title">{{ $page->title }}</div>
        <div class="prof-header-meta">
            <span><i class="bi bi-link-45deg"></i> /{{ $page->slug }}</span>
            <span><i class="bi bi-patch-check-fill"></i> {{ ucfirst($page->status) }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.cms.pages.edit', $page->id) }}" class="btn btn-success btn-sm">
            <i class="bi bi-pencil-fill"></i> Edit
        </a>
        <a href="{{ route('admin.cms.pages.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-type-h1"></i> Title</div>
                <div class="detail-value">{{ $page->title }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-link-45deg"></i> Slug</div>
                <div class="detail-value"><code style="font-size:12px;">{{ $page->slug }}</code></div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-toggle-on"></i> Status</div>
                <div class="detail-value">{{ ucfirst($page->status) }}</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-card-text"></i> Content</div>
                <div class="detail-value">{{ $page->content }}</div>
            </div>

            @if($page->meta_description)
            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-search"></i> Meta Description</div>
                <div class="detail-value">{{ $page->meta_description }}</div>
            </div>
            @endif

            @if($page->featured_image)
            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-image"></i> Featured Image</div>
                <div class="detail-value">
                    <img src="{{ asset('storage/' . $page->featured_image) }}" class="img-thumbnail" style="max-width:300px;">
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection
