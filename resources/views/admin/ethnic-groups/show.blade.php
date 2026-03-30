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
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M16.862 3.487a2.5 2.5 0 013.535 3.535l-10.61 10.61a2 2 0 01-.707.464l-4.243 1.414a.5.5 0 01-.632-.632l1.414-4.243a2 2 0 01.464-.707l10.61-10.61zm2.121 2.121a.5.5 0 00-.707 0l-1.414 1.414 2.121 2.121 1.414-1.414a.5.5 0 000-.707l-1.414-1.414zm-2.828 2.828L6.293 17.298l-1.06 3.182 3.182-1.06 9.862-9.862-2.121-2.121z"></path></svg> Edit
    </a>
</div>

{{-- Detail Card --}}
<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-people"></i> Name</div>
                                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M17 20v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 20v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg> Name</div>
                        <div class="detail-value">{{$ethnicGroup->name ?? '—'}}</div>
                    </div>
        </div>
    </div>
</div>

@endsection
