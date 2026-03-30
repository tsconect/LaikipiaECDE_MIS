@extends('web.app')
@section('styles')
<style>
    .page-shell {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 1.5rem;
    }

    .page-article,
    .page-side {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .page-article { padding: 1.5rem; }
    .page-side { padding: 1.2rem; }

    .page-title-main {
        font-family: 'Playfair Display', serif;
        color: var(--navy);
        font-size: clamp(1.8rem, 3.6vw, 2.5rem);
        margin-bottom: .75rem;
    }

    .meta-row {
        color: var(--text-muted);
        font-size: .95rem;
        display: flex;
        flex-wrap: wrap;
        gap: .85rem;
        margin-bottom: 1.1rem;
    }

    .content-body {
        line-height: 1.85;
        color: var(--text);
    }

    .content-body img {
        max-width: 100%;
        border-radius: 12px;
    }

    .share-link {
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

    .quick-links a {
        color: var(--navy);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: .5rem;
        padding: .4rem 0;
    }

    @media (max-width: 992px) {
        .page-shell { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('page-content')
<div class="page-shell">
    <article class="page-article">
            @if($page->featured_image)
                <img src="{{ asset('storage/' . $page->featured_image) }}" class="img-fluid rounded mb-4" alt="{{ $page->title }}">
            @endif
            
            <h1 class="page-title-main">{{ $page->title }}</h1>
            <div class="meta-row">
                <span><i class="fa fa-calendar me-1"></i>{{ $page->created_at->format('F d, Y') }}</span>
                <span><i class="fa fa-user me-1"></i>{{ $page->creator->name ?? 'Admin' }}</span>
            </div>

            <div class="content-body">
                {!! $page->content !!}
            </div>

            @if($page->meta_description)
                <div class="alert alert-info mt-4 mb-0">
                    <strong>Summary:</strong> {{ $page->meta_description }}
                </div>
            @endif

            <hr class="my-4">

            <h4 class="mb-3">Share This Page</h4>
            <a href="https://facebook.com/sharer/sharer.php?u={{ route('cms.page', $page->slug) }}" target="_blank" class="share-link"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="https://twitter.com/intent/tweet?url={{ route('cms.page', $page->slug) }}&text={{ urlencode($page->title) }}" target="_blank" class="share-link"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="mailto:?subject={{ urlencode($page->title) }}&body={{ urlencode(route('cms.page', $page->slug)) }}" class="share-link"><i class="fa fa-envelope"></i> Email</a>
    </article>

    <aside class="page-side">
        <h5 class="mb-2">Quick Links</h5>
        <div class="quick-links">
            <a href="{{ route('cms.posts') }}"><i class="fa fa-blog"></i> Blog</a>
            <a href="{{ route('cms.faqs') }}"><i class="fa fa-question-circle"></i> FAQs</a>
            <a href="{{ route('cms.galleries') }}"><i class="fa fa-images"></i> Galleries</a>
            <a href="{{ route('cms.testimonials') }}"><i class="fa fa-quote-left"></i> Testimonials</a>
            <a href="{{ route('cms.announcements') }}"><i class="fa fa-bullhorn"></i> Announcements</a>
        </div>
    </aside>
</div>
@endsection
