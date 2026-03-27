@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

{{-- Header --}}
<div class="prof-header">
    <div>
        <div class="prof-header-title">Academic Qualification</div>
    </div>
    <a href="{{ route('admin.education-histories.edit', $educationHistory->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-pencil-fill"></i> Edit
    </a>
</div>

{{-- Detail Card --}}
<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-building"></i> Institution Name</div>
                        <div class="detail-value">{{$educationHistory->institution_name ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-award"></i> Award</div>
                        <div class="detail-value">{{strtoupper($educationHistory->award ?? '') ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-book"></i> Course</div>
                        <div class="detail-value">{{$educationHistory->course ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-trophy"></i> Grade</div>
                        <div class="detail-value">{{$educationHistory->grade ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-calendar-event"></i> Start Date</div>
                        <div class="detail-value">{{$educationHistory->start_date ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-calendar-check"></i> End Date</div>
                        <div class="detail-value">{{$educationHistory->end_date ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-upc-scan"></i> Certificate Number</div>
                        <div class="detail-value">{{$educationHistory->certificate_no ?? null ?? '—'}}</div>
                    </div>
        </div>
    </div>
</div>

@endsection
