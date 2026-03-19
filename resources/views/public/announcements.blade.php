@extends('public.layout')

@section('page-content')
<div class="mb-5">
    <h1 class="mb-2">Announcements</h1>
    <p class="lead">Latest news and important updates</p>
</div>

@if($announcements->count() > 0)
    <div class="row g-4">
        @foreach($announcements as $announcement)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100" style="border-top:4px solid #006600;">
                    @if($announcement->image)
                        <img src="{{ asset('storage/' . $announcement->image) }}" class="card-img-top" alt="{{ $announcement->title }}" style="height: 210px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge badge-green">Announcement</span>
                            <span class="badge bg-light text-dark border">P{{ $announcement->priority }}</span>
                        </div>
                        <h5 class="card-title">{{ $announcement->title }}</h5>
                        <p class="small text-muted mb-2"><i class="fa fa-calendar"></i> {{ $announcement->start_date->format('M d, Y') }}</p>
                        <p class="card-text">{{ Str::limit(strip_tags($announcement->content), 130) }}</p>
                        <a href="{{ route('cms.announcements') }}" class="mt-auto text-decoration-none fw-semibold">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $announcements->links() }}
    </div>
@else
    <div class="empty-state">
        <i class="fa fa-bullhorn"></i>
        <h5 class="mb-2">No announcements yet</h5>
        <p class="mb-0">Important notices and updates will be posted here soon.</p>
    </div>
@endif
@endsection
