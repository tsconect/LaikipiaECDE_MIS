@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
@include('flash-message')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

@php
    $fullName = trim(($data->user->first_name ?? '') . ' ' . ($data->user->middle_name ?? '') . ' ' . ($data->user->last_name ?? ''));
@endphp

<div class="tp-header">
    <div class="d-flex align-items-center gap-3">
        <img class="tp-avatar" src="https://cdn-icons-png.flaticon.com/512/65/65581.png" alt="Coordinator">
        <div>
            <div class="tp-name">{{ $fullName ?: 'Coordinator' }}</div>
            <div class="tp-meta">
                <span><i class="bi bi-envelope-fill"></i> {{ $data->user->email ?? '—' }}</span>
                <span><i class="bi bi-telephone-fill"></i> {{ $data->user->phone_number ?? '—' }}</span>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.coordinators.edit', $data->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-pencil-fill"></i> Edit Coordinator
    </a>
</div>

<div class="tp-card">
    <div class="tp-card-body">
        <p class="section-title">Coordinator Profile</p>
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-person-vcard"></i> Full Names</div>
                <div class="detail-value">{{ $fullName ?: '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-envelope"></i> Email</div>
                <div class="detail-value">{{ $data->user->email ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-telephone"></i> Phone</div>
                <div class="detail-value">{{ $data->user->phone_number ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-credit-card"></i> ID Number</div>
                <div class="detail-value">{{ $data->id_number ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-file-earmark-text"></i> KRA PIN</div>
                <div class="detail-value">{{ $data->kra_pin ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-gender-ambiguous"></i> Gender</div>
                <div class="detail-value">{{ ucfirst($data->gender ?? '—') }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-cake"></i> Date of Birth</div>
                <div class="detail-value">{{ $data->dob ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-shield-check"></i> PWD Status</div>
                <div class="detail-value">{{ $data->pwd_status ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-person-raised-hand"></i> Disability Type</div>
                <div class="detail-value">{{ $data->disability_type ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-upc-scan"></i> PWD Number</div>
                <div class="detail-value">{{ $data->pwd_number ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-geo-alt"></i> County</div>
                <div class="detail-value">{{ $data->county_id ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-map"></i> Sub County</div>
                <div class="detail-value">{{ $data->constituency->name ?? ($data->subcounty_id ?? '—') }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-pin-map"></i> Ward</div>
                <div class="detail-value">{{ optional(optional($data->resident)->ward)->name ?? ($data->ward_id ?? '—') }}</div>
            </div>

            <div class="detail-item full">
                <div class="detail-label"><i class="bi bi-card-text"></i> Impairment Details</div>
                <div class="detail-value">{{ $data->impairment_details ?? '—' }}</div>
            </div>
        </div>
    </div>
</div>
@endsection