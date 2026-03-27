@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

{{-- Header --}}
<div class="prof-header">
    <div>
        <div class="prof-header-title">Union</div>
    </div>
    <a href="{{ route('admin.unions.edit', $union->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-pencil-fill"></i> Edit
    </a>
</div>

{{-- Detail Card --}}
<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-diagram-3"></i> Name</div>
                        <div class="detail-value">{{$union->name ?? '—'}}</div>
                    </div>
        </div>
    </div>
</div>

@endsection
