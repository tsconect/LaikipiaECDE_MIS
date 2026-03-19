@extends('public.layout')

@section('page-content')
<div class="row">
    <div class="col-lg-9">
        <article>
            @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid rounded mb-4" alt="{{ $post->title }}">
            @endif
            
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p class="text-muted small mb-4">
                <i class="fa fa-calendar"></i> {{ optional($post->published_at ?? $post->created_at)->format('F d, Y') ?? 'N/A' }}
                <span class="ms-3"><i class="fa fa-user"></i> {{ $post->author->name ?? 'Author' }}</span>
                <span class="ms-3"><i class="fa fa-eye"></i> {{ $post->views_count }} views</span>
            </p>

            <div class="post-content lead">
                {!! $post->content !!}
            </div>
        </article>

        <hr class="my-5">

        <section class="mb-5">
            <h4 class="mb-4">Share This Post</h4>
            <a href="https://facebook.com/sharer/sharer.php?u={{ route('cms.post', $post->slug) }}" target="_blank" class="btn btn-sm btn-primary">
                <i class="fab fa-facebook"></i> Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ route('cms.post', $post->slug) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn btn-sm btn-info">
                <i class="fab fa-twitter"></i> Twitter
            </a>
            <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode(route('cms.post', $post->slug)) }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-envelope"></i> Email
            </a>
        </section>

        @if($relatedPosts->count() > 0)
            <hr class="my-5">
            <section>
                <h4 class="mb-4">Related Articles</h4>
                <div class="row">
                    @foreach($relatedPosts as $related)
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('cms.post', $related->slug) }}" class="text-decoration-none">
                                @if($related->featured_image)
                                    <img src="{{ asset('storage/' . $related->featured_image) }}" class="img-fluid rounded mb-2" alt="{{ $related->title }}" style="height: 150px; object-fit: cover; width: 100%;">
                                @endif
                                <h6>{{ $related->title }}</h6>
                                <p class="text-muted small">{{ optional($related->published_at ?? $related->created_at)->format('M d, Y') ?? 'N/A' }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

    <div class="col-lg-3">
        <div class="card mb-4">
            <div class="card-header">
                <h5>About This Post</h5>
            </div>
            <div class="card-body">
                <p><strong>Author:</strong> {{ $post->author->name ?? 'Laikipia ECDE' }}</p>
                <p><strong>Published:</strong> {{ optional($post->published_at ?? $post->created_at)->format('F d, Y') ?? 'N/A' }}</p>
                <p><strong>Views:</strong> {{ $post->views_count }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Quick Links</h5>
            </div>
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('cms.posts') }}" class="nav-link">
                            <i class="fa fa-blog"></i> All Articles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cms.galleries') }}" class="nav-link">
                            <i class="fa fa-images"></i> Galleries
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cms.faqs') }}" class="nav-link">
                            <i class="fa fa-question-circle"></i> FAQs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cms.contact') }}" class="nav-link">
                            <i class="fa fa-envelope"></i> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
