@extends('public.layout')

@section('page-content')
<div class="row">
    <div class="col-lg-9">
        <article class="mb-5">
            @if($page->featured_image)
                <img src="{{ asset('storage/' . $page->featured_image) }}" class="img-fluid rounded mb-4" alt="{{ $page->title }}">
            @endif
            
            <h1 class="mb-3">{{ $page->title }}</h1>
            <p class="text-muted small mb-4">
                <i class="fa fa-calendar"></i> {{ $page->created_at->format('F d, Y') }}
                <span class="ms-3"><i class="fa fa-user"></i> {{ $page->creator->name ?? 'Admin' }}</span>
            </p>

            <div class="page-content lead">
                {!! $page->content !!}
            </div>

            @if($page->meta_description)
                <div class="alert alert-info mt-4">
                    <strong>Summary:</strong> {{ $page->meta_description }}
                </div>
            @endif
        </article>

        <hr>

        <section class="mt-4">
            <h4>Share This Page</h4>
            <a href="https://facebook.com/sharer/sharer.php?u={{ route('cms.page', $page->slug) }}" target="_blank" class="btn btn-sm btn-primary">
                <i class="fab fa-facebook"></i> Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ route('cms.page', $page->slug) }}&text={{ urlencode($page->title) }}" target="_blank" class="btn btn-sm btn-info">
                <i class="fab fa-twitter"></i> Twitter
            </a>
            <a href="mailto:?subject={{ urlencode($page->title) }}&body={{ urlencode(route('cms.page', $page->slug)) }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-envelope"></i> Email
            </a>
        </section>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h5>Quick Links</h5>
            </div>
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('cms.posts') }}" class="nav-link">
                            <i class="fa fa-blog"></i> Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cms.faqs') }}" class="nav-link">
                            <i class="fa fa-question-circle"></i> FAQs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cms.galleries') }}" class="nav-link">
                            <i class="fa fa-images"></i> Galleries
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cms.testimonials') }}" class="nav-link">
                            <i class="fa fa-quote-left"></i> Testimonials
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cms.announcements') }}" class="nav-link">
                            <i class="fa fa-bullhorn"></i> Announcements
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
