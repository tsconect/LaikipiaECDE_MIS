@extends('web.app')

@section('styles')
<style>
    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.2rem;
    }

    .testimonial-card {
        border: 1px solid var(--border);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        padding: 1.2rem;
        height: 100%;
        position: relative;
    }

    .testimonial-quote {
        color: var(--green-pale);
        font-size: 3rem;
        line-height: 1;
        position: absolute;
        top: .8rem;
        right: 1rem;
        font-family: 'Playfair Display', serif;
        user-select: none;
    }

    .avatar-holder {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        overflow: hidden;
        background: #e5ecf6;
        color: var(--navy);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }
</style>
@endsection

@section('page-content')
<div class="page-header-container">
    <h1 class="page-title">Testimonials</h1>
    <p class="page-subtitle">What people are saying about us.</p>
</div>

@if($testimonials->count() > 0)
    <div class="testimonials-grid">
        @foreach($testimonials as $testimonial)
            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <div class="d-flex align-items-center mb-3">
                    @if($testimonial->image)
                        <img src="{{ asset('storage/' . $testimonial->image) }}" class="avatar-holder me-3" alt="{{ $testimonial->name }}" style="object-fit: cover;">
                    @else
                        <div class="avatar-holder me-3">
                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
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

                <p class="mb-1" style="line-height: 1.8;">{{ Str::limit($testimonial->message, 150) }}</p>
                @if($testimonial->organization)
                    <small class="text-muted">{{ $testimonial->organization }}</small>
                @endif
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
