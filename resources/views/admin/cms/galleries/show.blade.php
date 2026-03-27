@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="prof-header">
    <div>
        <div class="prof-header-title">{{ $gallery->title }}</div>
        <div class="prof-header-meta">
            <span><i class="bi bi-images"></i> {{ $gallery->images()->count() }} images</span>
            <span><i class="bi bi-circle-fill"></i> {{ ucfirst($gallery->status) }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.cms.galleries.edit', $gallery->id) }}" class="btn btn-success btn-sm">
            <i class="bi bi-pencil-fill"></i> Edit / Upload
        </a>
        <a href="{{ route('admin.cms.galleries.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Gallery Info</p>
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-card-heading"></i> Title</div>
                <div class="detail-value">{{ $gallery->title }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-toggle-on"></i> Status</div>
                <div class="detail-value">{{ ucfirst($gallery->status) }}</div>
            </div>
            @if($gallery->description)
            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-card-text"></i> Description</div>
                <div class="detail-value">{{ $gallery->description }}</div>
            </div>
            @endif
        </div>

        @if($gallery->images()->count() > 0)
        <p class="section-title mt-4">Images ({{ $gallery->images()->count() }})</p>
        <div class="row g-3">
            @foreach($gallery->images()->orderBy('order')->get() as $image)
            <div class="col-6 col-md-3 col-lg-2">
                <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->caption }}" class="img-thumbnail w-100" style="height:120px;object-fit:cover;">
            </div>
            @endforeach
        </div>
        @else
        <p class="text-muted mt-3">No images uploaded yet.</p>
        @endif
    </div>
</div>

@endsection
