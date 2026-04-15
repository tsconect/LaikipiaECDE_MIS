@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

{{-- Header --}}
<div class="prof-header">
    <div>
        <div class="prof-header-title">Next of Kin</div>
    </div>
    <a href="{{ route('admin.next-of-kins.edit', $nextOfKin->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-pencil-fill"></i> Edit
    </a>
</div>

{{-- Detail Card --}}
<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-person"></i> First Name</div>
                        <div class="detail-value">{{$nextOfKin->first_name ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-person"></i> Middle Name</div>
                        <div class="detail-value">{{$nextOfKin->middle_name ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-person"></i> Last Name</div>
                        <div class="detail-value">{{$nextOfKin->last_name ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-calendar"></i> Date of Birth</div>
                        <div class="detail-value">{{$nextOfKin->dob ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-telephone"></i> Phone</div>
                        <div class="detail-value">{{$nextOfKin->phone_number ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-credit-card"></i> ID Number</div>
                        <div class="detail-value">{{$nextOfKin->id_number ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-envelope"></i> Email</div>
                        <div class="detail-value">{{$nextOfKin->email ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-heart"></i> Relationship</div>
                        <div class="detail-value">{{ucfirst($nextOfKin->relationship) ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-gender-ambiguous"></i> Gender</div>
                        <div class="detail-value">{{ucfirst($nextOfKin->gender) ?? '—'}}</div>
                    </div>
        </div>
    </div>
</div>

@endsection
