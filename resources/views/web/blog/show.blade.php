@extends('web.app')
@section('title', $post->title)
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── BLOG ARTICLE HERO ───────────────────────────── */
    .article-hero {
      background: #F1FDF3;
      padding: 140px 64px 60px;
      position: relative; overflow: hidden;
    }
    .article-hero::before {
      content: ''; position: absolute;
      top: -200px; right: -80px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(52,211,153,0.10) 0%, transparent 70%);
      pointer-events: none;
    }
    .article-hero .breadcrumb-nav {
      display: flex; align-items: center; gap: 8px;
      font-size: 13px; font-weight: 600;
      margin-bottom: 16px;
      position: relative; z-index: 1;
    }
    .article-hero .breadcrumb-nav a {
      color: var(--text-muted); text-decoration: none;
      transition: color 0.25s;
    }
    .article-hero .breadcrumb-nav a:hover { color: var(--green); }
    .article-hero .breadcrumb-nav span { color: rgba(13,34,53,0.25); }
    .article-hero .breadcrumb-nav .current { color: rgba(13,34,53,0.70); }

    .article-hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 4vw, 3rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 18px; max-width: 780px;
      line-height: 1.15;
      position: relative; z-index: 1;
    }
    .article-hero .article-meta-row {
      display: flex; flex-wrap: wrap; gap: 16px;
      position: relative; z-index: 1;
    }
    .article-hero .meta-item {
      display: inline-flex; align-items: center; gap: 6px;
      color: var(--text-muted); font-size: 13px; font-weight: 600;
    }
    .article-hero .meta-item i { color: var(--green); }

    /* ─── ARTICLE CONTENT ─────────────────────────────── */
    .article-content-area {
      padding: 48px 64px 80px;
      background: var(--cream);
    }
    .article-layout {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 340px;
      gap: 32px; align-items: start;
    }

    .article-panel {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
      overflow: hidden;
    }
    .article-cover {
      width: 100%; max-height: 480px;
      object-fit: cover; display: block;
    }
    .article-body {
      padding: 36px;
      line-height: 1.85; color: var(--text);
      font-size: 16px;
    }
    .article-body img {
      max-width: 100%; border-radius: var(--radius-md);
      height: auto;
    }
    .article-body h2, .article-body h3 {
      font-family: 'Space Grotesk', sans-serif;
      color: var(--navy); margin-top: 1.5em;
    }
    .article-body blockquote {
      border-left: 4px solid var(--green);
      padding: 16px 24px; margin: 1.5em 0;
      background: rgba(26,124,62,0.04);
      border-radius: 0 var(--radius-md) var(--radius-md) 0;
      font-style: italic;
    }

    /* Share section */
    .share-section {
      padding: 28px 36px;
      border-top: 1px solid var(--border);
    }
    .share-section h4 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; color: var(--navy);
      font-size: 1rem; margin-bottom: 14px;
    }
    .share-pills {
      display: flex; flex-wrap: wrap; gap: 10px;
    }
    .share-pill {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 8px 20px; border-radius: var(--radius-pill);
      background: rgba(26,124,62,0.06);
      border: 1px solid rgba(26,124,62,0.12);
      color: var(--green); font-weight: 700; font-size: 13px;
      text-decoration: none; transition: all 0.3s;
    }
    .share-pill:hover {
      background: var(--green); color: #fff;
      border-color: var(--green);
      transform: translateY(-2px);
    }

    /* Related posts */
    .related-section {
      padding: 28px 36px 36px;
      border-top: 1px solid var(--border);
    }
    .related-section h4 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; color: var(--navy);
      font-size: 1rem; margin-bottom: 16px;
    }
    .related-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .related-card {
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      overflow: hidden; background: #fff;
      text-decoration: none; color: inherit;
      display: block; transition: all 0.3s;
    }
    .related-card:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-md);
    }
    .related-card img { width: 100%; height: 120px; object-fit: cover; }
    .related-card .body { padding: 14px; }
    .related-card h6 {
      font-family: 'Space Grotesk', sans-serif;
      color: var(--navy); font-weight: 700;
      font-size: 0.85rem; margin-bottom: 4px;
    }

    /* Side panel */
    .side-panel {
      position: sticky; top: 100px;
      display: flex; flex-direction: column; gap: 20px;
    }
    .side-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-sm);
      padding: 28px;
    }
    .side-card h5 {
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; color: var(--navy);
      font-size: 0.95rem; margin-bottom: 16px;
    }
    .side-card .info-row {
      display: flex; justify-content: space-between;
      padding: 8px 0; border-bottom: 1px solid rgba(13,34,53,0.05);
      font-size: 14px;
    }
    .side-card .info-row:last-child { border-bottom: none; }
    .side-card .info-label { color: var(--text-muted); font-weight: 600; }
    .side-card .info-value { color: var(--navy); font-weight: 700; }

    .side-links-card {
      background: var(--navy);
      border-radius: var(--radius-xl);
      padding: 24px; box-shadow: var(--shadow-lg);
    }
    .side-links-card h5 {
      color: #fff; font-family: 'Space Grotesk', sans-serif;
      font-weight: 700; font-size: 0.95rem;
      margin-bottom: 14px;
    }
    .side-links-card a {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 14px; border-radius: var(--radius-sm);
      color: rgba(255,255,255,0.60); text-decoration: none;
      font-size: 14px; font-weight: 600;
      transition: all 0.25s; margin-bottom: 4px;
    }
    .side-links-card a:hover {
      color: #fff; background: rgba(255,255,255,0.08);
    }
    .side-links-card a i { width: 16px; text-align: center; }

    @media (max-width: 992px) {
      .article-layout { grid-template-columns: 1fr; }
      .side-panel { position: static; }
      .related-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 900px) {
      .article-hero { padding: 120px 24px 50px; }
      .article-content-area { padding: 32px 24px 60px; }
      .article-body { padding: 24px; }
      .share-section, .related-section { padding: 20px 24px; }
    }
</style>
@endsection

@section('content')
<!-- Article Hero -->
<div class="article-hero">
    <div class="breadcrumb-nav" style="animation: fadeUp 0.6s ease both;">
        <a href="{{ url('/') }}">Home</a>
        <span>/</span>
        <a href="{{ route('cms.posts') }}">Blog</a>
        <span>/</span>
        <span class="current">{{ Str::limit($post->title, 40) }}</span>
    </div>
    <h1 style="animation: fadeUp 0.7s ease 0.1s both;">{{ $post->title }}</h1>
    <div class="article-meta-row" style="animation: fadeUp 0.7s ease 0.2s both;">
        <span class="meta-item">
            <i class="far fa-calendar"></i>
            {{ optional($post->published_at ?? $post->created_at)->format('F d, Y') ?? 'N/A' }}
        </span>
        <span class="meta-item">
            <i class="far fa-user"></i>
            {{ $post->author->name ?? 'Author' }}
        </span>
        <span class="meta-item">
            <i class="far fa-eye"></i>
            {{ $post->views_count }} views
        </span>
    </div>
</div>

<div class="article-content-area">
    <div class="article-layout">
        <!-- Article Panel -->
        <div class="article-panel reveal">
            @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="article-cover" alt="{{ $post->title }}">
            @endif

            <div class="article-body">{!! $post->content !!}</div>

            <!-- Share -->
            <div class="share-section">
                <h4>Share This Post</h4>
                <div class="share-pills">
                    <a href="https://facebook.com/sharer/sharer.php?u={{ route('cms.post', $post->slug) }}" target="_blank" class="share-pill">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ route('cms.post', $post->slug) }}&text={{ urlencode($post->title) }}" target="_blank" class="share-pill">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode(route('cms.post', $post->slug)) }}" class="share-pill">
                        <i class="fas fa-envelope"></i> Email
                    </a>
                </div>
            </div>

            <!-- Related -->
            @if($relatedPosts->count() > 0)
            <div class="related-section">
                <h4>Related Articles</h4>
                <div class="related-grid">
                    @foreach($relatedPosts as $related)
                    <a href="{{ route('cms.post', $related->slug) }}" class="related-card">
                        @if($related->featured_image)
                            <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}">
                        @endif
                        <div class="body">
                            <h6>{{ $related->title }}</h6>
                            <p class="text-muted small mb-0">{{ optional($related->published_at ?? $related->created_at)->format('M d, Y') ?? 'N/A' }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Side Panel -->
        <div class="side-panel">
            <div class="side-card reveal">
                <h5>About This Post</h5>
                <div class="info-row">
                    <span class="info-label">Author</span>
                    <span class="info-value">{{ $post->author->name ?? 'Laikipia ECDE' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Published</span>
                    <span class="info-value">{{ optional($post->published_at ?? $post->created_at)->format('M d, Y') ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Views</span>
                    <span class="info-value">{{ $post->views_count }}</span>
                </div>
            </div>

            <div class="side-links-card reveal">
                <h5>Quick Links</h5>
                <a href="{{ route('cms.posts') }}"><i class="fas fa-blog"></i> All Articles</a>
                <a href="{{ route('cms.galleries') }}"><i class="fas fa-images"></i> Galleries</a>
                <a href="{{ route('cms.faqs') }}"><i class="fas fa-question-circle"></i> FAQs</a>
                <a href="{{ route('cms.contact') }}"><i class="fas fa-envelope"></i> Contact</a>
            </div>
        </div>
    </div>
</div>
@endsection
