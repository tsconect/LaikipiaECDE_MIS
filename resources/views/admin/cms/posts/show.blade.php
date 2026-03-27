@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<div class="prof-header">
    <div>
        <div class="prof-header-title">{{ $post->title }}</div>
        <div class="prof-header-meta">
            <span><i class="bi bi-person"></i> {{ $post->author->first_name ?? 'System' }}</span>
            <span><i class="bi bi-link-45deg"></i> /blog/{{ $post->slug }}</span>
            <span><i class="bi bi-circle-fill"></i> {{ ucfirst($post->status) }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.cms.posts.edit', $post->id) }}" class="btn btn-success btn-sm">
            <i class="bi bi-pencil-fill"></i> Edit
        </a>
        <a href="{{ route('admin.cms.posts.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-person"></i> Author</div>
                <div class="detail-value">{{ $post->author->first_name ?? 'System' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-tag"></i> Category</div>
                <div class="detail-value">{{ $post->category->name ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-toggle-on"></i> Status</div>
                <div class="detail-value">{{ ucfirst($post->status) }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-link-45deg"></i> Slug</div>
                <div class="detail-value"><code style="font-size:12px;">{{ $post->slug }}</code></div>
            </div>

            @if($post->excerpt)
            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-blockquote-left"></i> Excerpt</div>
                <div class="detail-value">{{ $post->excerpt }}</div>
            </div>
            @endif

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-card-text"></i> Content</div>
                <div class="detail-value">{!! $post->content !!}</div>
            </div>

            @if($post->featured_image)
            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-image"></i> Featured Image</div>
                <div class="detail-value">
                    <img src="{{ Storage::url($post->featured_image) }}" class="img-thumbnail" style="max-width:300px;">
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection
