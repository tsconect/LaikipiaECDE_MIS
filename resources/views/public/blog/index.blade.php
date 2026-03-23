@extends('front.app')

@section('title', 'Blog')

@section('content')
<div class="container py-5">
    <div class="page-header-container">
        <h1 class="page-title">Blog</h1>
        <p class="page-subtitle">Latest articles, stories, and updates from our team.</p>
    </div>

    @if($posts->count() > 0)
        <div class="row g-4">
            @foreach($posts as $post)
                <div class="col-12 col-md-6 col-lg-4">
                    <article class="card home-section-card home-content-card listing-card-compact">
                        @if($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 210px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <div class="home-meta mb-2">
                                <i class="fa fa-calendar me-1"></i> {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') ?? 'N/A' }}
                            </div>
                            <p class="card-text text-muted">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                            <a href="{{ route('cms.post', $post->slug) }}" class="text-decoration-none read-more-link mt-auto">Read More <i class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @else
        <div class="empty-state-container">
            <div class="empty-state">
                <i class="fa fa-newspaper-o"></i>
                <h5 class="mb-2">No blog posts yet</h5>
                <p class="mb-0">We are preparing valuable stories and updates for you.</p>
            </div>
        </div>
    @endif
</div>
@endsection
