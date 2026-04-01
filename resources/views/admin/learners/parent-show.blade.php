@extends('admin.app')

@section('content')
@php
    $learnerName = trim(($learner->first_name ?? '') . ' ' . ($learner->middle_name ?? '') . ' ' . ($learner->last_name ?? ''));
    $parentName = trim(($parent->first_name ?? '') . ' ' . ($parent->middle_name ?? '') . ' ' . ($parent->last_name ?? ''));
@endphp

<div class="prof-header">
    <div>
        <div class="prof-header-title">Parent / Guardian Details</div>
        <div class="prof-header-meta">
            <span><i class="bi bi-person"></i> Learner: {{ $learnerName ?: '-' }}</span>
            <span><i class="bi bi-people"></i> Parent/Guardian: {{ $parentName ?: '-' }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.learners.edit', $learner->id) }}#parent-guardian" class="btn btn-success btn-sm">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
    </div>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-person-badge"></i> Full Name</div>
                <div class="detail-value">{{ $parentName ?: '-' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-person-vcard"></i> Relationship</div>
                <div class="detail-value">{{ ucfirst($parent->relationship ?? '-') }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-credit-card"></i> ID Number</div>
                <div class="detail-value">{{ $parent->id_number ?? '-' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-telephone"></i> Phone Number</div>
                <div class="detail-value">{{ $parent->phone_number ?? '-' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-envelope"></i> Email</div>
                <div class="detail-value">{{ $parent->email ?? '-' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-geo-alt"></i> Ward</div>
                <div class="detail-value">{{ $parent->ward->name ?? '-' }}</div>
            </div>
            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-house-door"></i> Village</div>
                <div class="detail-value">{{ $parent->village ?? '-' }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
