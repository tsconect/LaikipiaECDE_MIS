@extends('web.app')

@section('styles')
<style>
    .content-shell {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 1.5rem;
        align-items: start;
    }

    .article-panel,
    .side-panel {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .article-panel {
        padding: 1.5rem;
    }

    .side-panel {
        padding: 1.25rem;
    }

    .article-title {
        font-family: 'Playfair Display', serif;
        color: var(--navy);
        font-size: clamp(1.8rem, 3.5vw, 2.5rem);
        margin-bottom: .75rem;
    }

    .article-meta {
        color: var(--text-muted);
        font-size: .95rem;
        display: flex;
        flex-wrap: wrap;
        gap: .85rem;
        margin-bottom: 1.1rem;
    }

    .article-content {
        line-height: 1.8;
        color: var(--text);
    }

    .article-content img {
        max-width: 100%;
        border-radius: 12px;
        height: auto;
    }

    .article-cover {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
    }

    .section-head {
        font-family: 'Playfair Display', serif;
        color: var(--navy);
        font-size: 1.35rem;
        margin-bottom: 1rem;
    }

    .chip-link {
        display: inline-flex;
        align-items: center;
        gap: .45rem;
        background: var(--green-pale);
        color: var(--green);
        border: 1px solid rgba(26, 124, 62, 0.2);
        border-radius: 999px;
        padding: .45rem .8rem;
        font-weight: 600;
        text-decoration: none;
        margin-right: .45rem;
        margin-bottom: .45rem;
    }

    .related-card {
        border: 1px solid var(--border);
        border-radius: 14px;
        overflow: hidden;
        background: #fff;
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    .related-card .body {
        padding: .85rem;
    }

    .quick-links a {
        color: var(--navy);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: .5rem;
        padding: .45rem 0;
    }

    @media (max-width: 992px) {
        .content-shell {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('page-content')
<div class="content-shell">
    <div class="article-panel">
        @if($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid rounded-4 mb-4 article-cover" alt="{{ $post->title }}">
        @endif

        <h1 class="article-title">{{ $post->title }}</h1>
        <div class="article-meta">
            <span><i class="fa fa-calendar me-1"></i>{{ optional($post->published_at ?? $post->created_at)->format('F d, Y') ?? 'N/A' }}</span>
            <span><i class="fa fa-user me-1"></i>{{ $post->author->name ?? 'Author' }}</span>
            <span><i class="fa fa-eye me-1"></i>{{ $post->views_count }} views</span>
        </div>

        <div class="article-content">{!! $post->content !!}</div>

        <hr class="my-4">

        <h4 class="section-head">Share This Post</h4>
        <a href="https://facebook.com/sharer/sharer.php?u={{ route('cms.post', $post->slug) }}" target="_blank" class="chip-link"><i class="fab fa-facebook"></i> Facebook</a>
        <a href="https://twitter.com/intent/tweet?url={{ route('cms.post', $post->slug) }}&text={{ urlencode($post->title) }}" target="_blank" class="chip-link"><i class="fab fa-twitter"></i> Twitter</a>
        <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode(route('cms.post', $post->slug)) }}" class="chip-link"><i class="fa fa-envelope"></i> Email</a>

        @if($relatedPosts->count() > 0)
            <hr class="my-4">
            <h4 class="section-head">Related Articles</h4>
            <div class="row g-3">
                @foreach($relatedPosts as $related)
                    <div class="col-md-6">
                        <a href="{{ route('cms.post', $related->slug) }}" class="related-card">
                            @if($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}" class="img-fluid" alt="{{ $related->title }}" style="height: 150px; object-fit: cover; width: 100%;">
                            @endif
                            <div class="body">
                                <h6 class="mb-1">{{ $related->title }}</h6>
                                <p class="text-muted small mb-0">{{ optional($related->published_at ?? $related->created_at)->format('M d, Y') ?? 'N/A' }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <aside class="side-panel">
        <h5 class="mb-3">About This Post</h5>
        <p class="mb-2"><strong>Author:</strong> {{ $post->author->name ?? 'Laikipia ECDE' }}</p>
        <p class="mb-2"><strong>Published:</strong> {{ optional($post->published_at ?? $post->created_at)->format('F d, Y') ?? 'N/A' }}</p>
        <p class="mb-0"><strong>Views:</strong> {{ $post->views_count }}</p>

        <hr>

        <h5 class="mb-2">Quick Links</h5>
        <div class="quick-links">
            <a href="{{ route('cms.posts') }}"><i class="fa fa-blog"></i> All Articles</a>
            <a href="{{ route('cms.galleries') }}"><i class="fa fa-images"></i> Galleries</a>
            <a href="{{ route('cms.faqs') }}"><i class="fa fa-question-circle"></i> FAQs</a>
            <a href="{{ route('cms.contact') }}"><i class="fa fa-envelope"></i> Contact</a>
        </div>
    </aside>
</div>
@endsection
