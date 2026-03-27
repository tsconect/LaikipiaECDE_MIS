@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="prof-header">
    <div>
        <div class="prof-header-title">Announcement</div>
        <div class="prof-header-meta">
            <span><i class="bi bi-circle-fill"></i> {{ ucfirst($announcement->status) }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.cms.announcements.edit', $announcement->id) }}" class="btn btn-success btn-sm">
            <i class="bi bi-pencil-fill"></i> Edit
        </a>
        <a href="{{ route('admin.cms.announcements.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-type-h1"></i> Title</div>
                <div class="detail-value">{{ $announcement->title }}</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-card-text"></i> Content</div>
                <div class="detail-value">{{ $announcement->content }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-sort-numeric-up"></i> Priority</div>
                <div class="detail-value">{{ $announcement->priority }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-calendar-event"></i> Start Date</div>
                <div class="detail-value">{{ $announcement->start_date }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-calendar-check"></i> End Date</div>
                <div class="detail-value">{{ $announcement->end_date }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-toggle-on"></i> Status</div>
                <div class="detail-value">{{ ucfirst($announcement->status) }}</div>
            </div>

            @if($announcement->image)
            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-image"></i> Image</div>
                <div class="detail-value">
                    <img src="{{ asset('storage/' . $announcement->image) }}" class="img-thumbnail" style="max-width:280px;">
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection
