@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="prof-header">
    <div>
        <div class="prof-header-title">User Document</div>
    </div>
    <a href="{{ route('admin.user-documents.edit', $userDocument->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-pencil-square"></i> Edit
    </a>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-file-earmark-text"></i> Document Type</div>
                <div class="detail-value">{{ $userDocument->document->name ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-file-earmark-arrow-down"></i> File</div>
                <div class="detail-value">
                    @if($userDocument->file_path)
                        <a href="{{ Storage::url($userDocument->file_path) }}" target="_blank" class="btn btn-success btn-sm">
                            <i class="bi bi-download"></i> View / Download
                        </a>
                    @else
                        <span class="muted">— No file uploaded</span>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
