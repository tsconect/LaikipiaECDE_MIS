@extends('public.layout')

@section('page-content')
<div class="mb-5">
    <h1 class="mb-2">Testimonials</h1>
    <p class="lead">What people are saying about us</p>
</div>

@if($testimonials->count() > 0)
    <div class="row g-4">
        @foreach($testimonials as $testimonial)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100" style="border-top: 4px solid #1a3a5c;">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center mb-3">
                            @if($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" class="rounded-circle me-3" alt="{{ $testimonial->name }}" style="width: 54px; height: 54px; object-fit: cover;">
                            @else
                                <div class="rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; background:#e2e8f0; color:#1a3a5c;">
                                    <i class="fa fa-user"></i>
                                </div>
                            @endif
                            <div>
                                <h6 class="mb-0">{{ $testimonial->name }}</h6>
                                <small class="text-muted">{{ $testimonial->position ?: 'Community Member' }}</small>
                            </div>
                        </div>

                        <div class="mb-2 text-warning">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </div>

                        <p class="mb-3" style="font-size: 2rem; line-height: 1; color:#1a3a5c;">“</p>
                        <p class="card-text mb-3">{{ Str::limit($testimonial->message, 150) }}</p>
                        @if($testimonial->organization)
                            <small class="text-muted mt-auto">{{ $testimonial->organization }}</small>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <i class="fa fa-comments-o"></i>
        <h5 class="mb-2">No testimonials yet</h5>
        <p class="mb-0">Be the first to share your experience with us.</p>
    </div>
@endif
@endsection
