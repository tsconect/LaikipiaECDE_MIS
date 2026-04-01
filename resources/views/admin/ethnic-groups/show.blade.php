@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

{{-- Header --}}
<div class="prof-header">
    <div>
        <div class="prof-header-title">Ethnic Group</div>
    </div>
    <a href="{{ route('admin.ethnic-groups.edit', $ethnicGroup->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-circle"></i> Edit
    </a>
</div>

{{-- Detail Card --}}
<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-people"></i> Name</div>
                                                <div class="detail-label"><i class="bi bi-circle"></i> Name</div>
                        <div class="detail-value">{{$ethnicGroup->name ?? '—'}}</div>
                    </div>
        </div>
    </div>
</div>

@endsection
