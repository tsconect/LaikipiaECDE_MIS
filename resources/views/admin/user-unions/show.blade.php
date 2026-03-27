@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

{{-- Header --}}
<div class="prof-header">
    <div>
        <div class="prof-header-title">Union Membership</div>
    </div>
    <a href="{{ route('admin.user-unions.edit', $userUnion->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-pencil-fill"></i> Edit
    </a>
</div>

{{-- Detail Card --}}
<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-diagram-3"></i> Union</div>
                        <div class="detail-value">{{$userUnion->union->name ?? null ?? '—'}}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-card-text"></i> Membership Number</div>
                        <div class="detail-value">{{$userUnion->membership_number ?? null ?? '—'}}</div>
                    </div>
        </div>
    </div>
</div>

@endsection
