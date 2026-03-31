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
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M16.862 3.487a2.5 2.5 0 013.535 3.535l-10.61 10.61a2 2 0 01-.707.464l-4.243 1.414a.5.5 0 01-.632-.632l1.414-4.243a2 2 0 01.464-.707l10.61-10.61zm2.121 2.121a.5.5 0 00-.707 0l-1.414 1.414 2.121 2.121 1.414-1.414a.5.5 0 000-.707l-1.414-1.414zm-2.828 2.828L6.293 17.298l-1.06 3.182 3.182-1.06 9.862-9.862-2.121-2.121z"></path></svg> Edit
    </a>
</div>

{{-- Detail Card --}}
<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-diagram-3"></i> Name</div>
                                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a2 2 0 012 2v2h2a2 2 0 012 2v2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2v2a2 2 0 01-2 2h-2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2H6a2 2 0 01-2-2v-2H2a2 2 0 01-2-2v-2a2 2 0 012-2h2V8a2 2 0 012-2h2V4a2 2 0 012-2h2zm0 2h-2v2a2 2 0 01-2 2H6v2a2 2 0 01-2 2v2h2a2 2 0 012 2v2h2v2h2v-2h2v-2a2 2 0 012-2h2v-2a2 2 0 01-2-2h-2V6a2 2 0 01-2-2z"></path></svg> Name</div>
                        <div class="detail-value">{{$union->name ?? '—'}}</div>
                    </div>
        </div>
    </div>
</div>

@endsection
