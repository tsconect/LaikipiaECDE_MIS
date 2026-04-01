@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')

<div class="prof-header">
    <div>
        <div class="prof-header-title">User Document</div>
    </div>
    <a href="{{ route('admin.user-documents.edit', $userDocument->id) }}" class="btn btn-success btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M16.862 3.487a2.5 2.5 0 013.535 3.535l-10.61 10.61a2 2 0 01-.707.464l-4.243 1.414a.5.5 0 01-.632-.632l1.414-4.243a2 2 0 01.464-.707l10.61-10.61zm2.121 2.121a.5.5 0 00-.707 0l-1.414 1.414 2.121 2.121 1.414-1.414a.5.5 0 000-.707l-1.414-1.414zm-2.828 2.828L6.293 17.298l-1.06 3.182 3.182-1.06 9.862-9.862-2.121-2.121z"></path></svg> Edit
    </a>
</div>

<div class="prof-card">
    <div class="prof-card-body">
        <p class="section-title">Details</p>
        <div class="detail-grid">

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-file-earmark-text"></i> Document Type</div>
                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M6 2a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8.828a2 2 0 00-.586-1.414l-5.828-5.828A2 2 0 0013.172 2H6zm7 1.414L19.586 10H17a1 1 0 01-1-1V3.414zM6 4h6v5a2 2 0 002 2h5v9a1 1 0 01-1 1H6a1 1 0 01-1-1V4zm7 10v-2h-2v2h2zm-4 0v-2H7v2h2zm0 2v-2H7v2h2zm4 0v-2h-2v2h2z"></path></svg> Document Type</div>
                <div class="detail-value">{{ $userDocument->document->name ?? '—' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label"><i class="bi bi-file-earmark-arrow-down"></i> File</div>
                                <div class="detail-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M6 2a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8.828a2 2 0 00-.586-1.414l-5.828-5.828A2 2 0 0013.172 2H6zm7 1.414L19.586 10H17a1 1 0 01-1-1V3.414zM6 4h6v5a2 2 0 002 2h5v9a1 1 0 01-1 1H6a1 1 0 01-1-1V4zm5 10v-4h-2v4H8l4 4 4-4h-3z"></path></svg> File</div>
                <div class="detail-value">
                    @if($userDocument->file_path)
                        <a href="{{ Storage::url($userDocument->file_path) }}" target="_blank" class="btn btn-success btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 16l4-4h-3V4h-2v8H8l4 4zm-8 4v-2h16v2H4z"></path></svg> View / Download
                        </a>
                    @else
                        <span class="muted">— No file uploaded</span>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
