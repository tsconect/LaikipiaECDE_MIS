@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

{{-- Header --}}
<div class="prof-header">
    <div>
        <div class="prof-header-title">Job Group</div>
    </div>
    <a href="{{ route('admin.job-groups.edit', $jobGroup->id) }}" class="btn btn-success btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M16.862 3.487a2.5 2.5 0 013.535 3.535l-10.61 10.61a2 2 0 01-.707.464l-4.243 1.414a.5.5 0 01-.632-.632l1.414-4.243a2 2 0 01.464-.707l10.61-10.61zm2.121 2.121a.5.5 0 00-.707 0l-1.414 1.414 2.121 2.121 1.414-1.414a.5.5 0 000-.707l-1.414-1.414zm-2.828 2.828L6.293 17.298l-1.06 3.182 3.182-1.06 9.862-9.862-2.121-2.121z"></path></svg> Edit
    </a>
</div>

{{-- Detail Card --}}
<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label"><i class="bi bi-layers"></i> Name</div>
                                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 7l11 5 11-5-11-5zm0 7.236L4.618 7 12 3.764 19.382 7 12 9.236zm9 2.764l-1.447-.658-7.553 3.422-7.553-3.422L3 12.236V17l9 4 9-4v-4.236zM12 19.236L5 16.236v-2.764l7 3.182 7-3.182v2.764l-7 3z"></path></svg> Name</div>
                        <div class="detail-value">{{$jobGroup->name ?? '—'}}</div>
                    </div>
        </div>
    </div>
</div>

@endsection
