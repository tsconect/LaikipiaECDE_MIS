@extends('web.app')

@section('title', 'Announcements')

@section('content')
<div class="container py-5">
    <div class="page-header-container">
        <h1 class="page-title">Announcements</h1>
        <p class="page-subtitle">Latest news and important updates from our team.</p>
    </div>

    @if($announcements->count() > 0)
        <div class="row g-4">
            @foreach($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card home-section-card home-content-card announcement-card listing-card-compact">
                        @if($announcement->image)
                            <img src="{{ asset('storage/' . $announcement->image) }}" class="card-img-top" alt="{{ $announcement->title }}" style="height: 210px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <div class="home-meta mb-2">
                                <i class="fa fa-calendar me-1"></i> {{ $announcement->start_date->format('M d, Y') }}
                            </div>
                            <p class="card-text text-muted">{{ Str::limit(strip_tags($announcement->content), 120) }}</p>
                            <a href="{{ route('cms.announcement.show', $announcement->id) }}" class="text-decoration-none read-more-link mt-auto">Read More <i class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $announcements->links() }}
        </div>
    @else
        <div class="empty-state-container">
            <div class="empty-state">
                <i class="fa fa-bullhorn"></i>
                <h5 class="mb-2">No announcements yet</h5>
                <p class="mb-0">Important notices and updates will be posted here soon.</p>
            </div>
        </div>
    @endif
</div>
@endsection
