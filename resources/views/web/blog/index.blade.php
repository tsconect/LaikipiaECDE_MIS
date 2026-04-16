@extends('web.app')
@section('title', 'Blog')
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── BLOG HERO ───────────────────────────────────── */
    .blog-hero {
      background: #F1FDF3;
      padding: 72px 64px 32px;
      position: relative; overflow: hidden;
    }
    .blog-hero::before {
      content: ''; position: absolute;
      top: -200px; right: -60px;
      width: 550px; height: 550px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.04) 0%, transparent 70%);
      pointer-events: none;
    }
    .blog-hero::after {
      content: ''; position: absolute;
      bottom: -100px; left: 10%;
      width: 350px; height: 350px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.03) 0%, transparent 70%);
      pointer-events: none;
    }
    .blog-hero .page-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.2rem, 4vw, 3.1rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 10px;
      position: relative; z-index: 1;
    }
    .blog-hero .page-subtitle {
      color: var(--text-muted);
      font-size: 15px; max-width: 520px; line-height: 1.55;
      position: relative; z-index: 1;
    }
    .blog-hero .floating-asset {
      position: absolute; right: 60px; bottom: -20px;
      height: 170px; z-index: 0;
      animation: floatBounce 6s ease-in-out infinite;
      filter: drop-shadow(0 20px 40px rgba(0,0,0,0.20));
      pointer-events: none;
      opacity: 0.85;
    }

    /* ─── BLOG BENTO GRID ─────────────────────────────── */
    .blog-content-area {
      padding: 60px 64px 80px;
      background: var(--cream);
    }
    .blog-bento {
      display: grid;
      grid-template-columns: 1.6fr 1fr;
      grid-template-rows: auto auto;
      gap: 24px;
    }
    .blog-bento .bento-featured { grid-row: span 2; }

    .blog-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      display: flex; flex-direction: column;
    }
    .blog-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
    }
    .blog-card-featured {
      height: 100%;
    }
    .blog-card-featured .blog-card-img {
      height: 260px;
    }
    .blog-card-img {
      width: 100%; height: 170px;
      object-fit: cover; display: block;
    }
    .blog-card-img-placeholder {
      width: 100%; height: 170px;
      background: linear-gradient(135deg, rgba(13,34,53,0.06) 0%, rgba(26,124,62,0.08) 100%);
      display: flex; align-items: center; justify-content: center;
    }
    .blog-card-img-placeholder i { font-size: 2.5rem; color: rgba(13,34,53,0.15); }
    .blog-card-body {
      padding: 28px; flex: 1;
      display: flex; flex-direction: column;
    }
    .blog-card-meta {
      display: flex; align-items: center; gap: 12px;
      margin-bottom: 14px;
    }
    .blog-card-date {
      display: inline-flex; align-items: center; gap: 6px;
      font-size: 12px; font-weight: 700; color: var(--text-muted);
      text-transform: uppercase; letter-spacing: 0.04em;
    }
    .blog-card h3 {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 1.15rem; font-weight: 700;
      color: var(--navy); margin-bottom: 10px;
      line-height: 1.35;
    }
    .blog-card-featured h3 {
      font-size: 1.5rem;
    }
    .blog-card p {
      font-size: 14px; color: var(--text-muted);
      line-height: 1.65; margin-bottom: 20px;
      display: -webkit-box;
      -webkit-line-clamp: 3; line-clamp: 3;
      -webkit-box-orient: vertical; overflow: hidden;
    }
    .blog-card .read-more {
      margin-top: auto;
      display: inline-flex; align-items: center; gap: 8px;
      color: var(--green); font-weight: 700; font-size: 14px;
      text-decoration: none;
      padding: 8px 20px; border-radius: var(--radius-pill);
      background: rgba(26,124,62,0.08);
      border: 1px solid rgba(26,124,62,0.15);
      transition: all 0.3s;
      width: fit-content;
    }
    .blog-card .read-more:hover {
      background: var(--green); color: #fff;
      border-color: var(--green);
      transform: translateX(2px);
    }
    .blog-card .read-more svg { transition: transform 0.3s; }
    .blog-card .read-more:hover svg { transform: translateX(3px); }

    /* Regular grid after bento first row */
    .blog-regular-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      margin-top: 24px;
    }

    /* Pagination */
    .blog-pagination {
      display: flex; justify-content: center;
      margin-top: 48px;
    }

    @media (max-width: 1100px) {
      .blog-bento { grid-template-columns: 1fr; }
      .blog-bento .bento-featured { grid-row: auto; }
      .blog-regular-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 900px) {
      .blog-hero { padding: 62px 16px 28px; }
      .blog-hero .floating-asset { display: none; }
      .blog-content-area { padding: 40px 24px 60px; }
      .blog-regular-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<!-- Blog Hero -->
<div class="blog-hero">
    <h1 class="page-title" style="animation: fadeUp 0.7s ease both;">Blog</h1>
    <p class="page-subtitle" style="animation: fadeUp 0.7s ease 0.1s both;">Latest articles, stories, and updates from early childhood education across Laikipia County.</p>
    <img src="{{ asset('assets/images/stock_image_I_generated-removebg-preview.png') }}"
         alt="" class="floating-asset" loading="lazy">
</div>

<div class="blog-content-area">
    @if($posts->count() > 0)
        @if($posts->count() >= 3)
        <!-- Bento layout for first 3 posts -->
        <div class="blog-bento">
            @php $featured = $posts->first(); @endphp
            <div class="bento-featured">
                <article class="blog-card blog-card-featured reveal">
                    @if($featured->featured_image)
                        <img src="{{ asset('storage/' . $featured->featured_image) }}" class="blog-card-img" alt="{{ $featured->title }}" style="height:250px;">
                    @else
                        <div class="blog-card-img-placeholder" style="height:250px;">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    @endif
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span class="tag-pill tag-pill-green">Featured</span>
                            <span class="blog-card-date">
                                <i class="far fa-calendar"></i>
                                {{ optional($featured->published_at ?? $featured->created_at)->format('M d, Y') ?? 'N/A' }}
                            </span>
                        </div>
                        <h3>{{ $featured->title }}</h3>
                        <p>{{ Str::limit(strip_tags($featured->content), 200) }}</p>
                        <a href="{{ route('cms.post', $featured->slug) }}" class="read-more">
                            Read Article
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            </div>
            @foreach($posts->slice(1, 2) as $post)
            <div>
                <article class="blog-card reveal">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="blog-card-img" alt="{{ $post->title }}">
                    @else
                        <div class="blog-card-img-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    @endif
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span class="blog-card-date">
                                <i class="far fa-calendar"></i>
                                {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') ?? 'N/A' }}
                            </span>
                        </div>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ route('cms.post', $post->slug) }}" class="read-more">
                            Read More
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <!-- Remaining posts in regular grid -->
        @if($posts->count() > 3)
        <div class="blog-regular-grid">
            @foreach($posts->slice(3) as $post)
                <article class="blog-card reveal">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="blog-card-img" alt="{{ $post->title }}">
                    @else
                        <div class="blog-card-img-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    @endif
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span class="blog-card-date">
                                <i class="far fa-calendar"></i>
                                {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') ?? 'N/A' }}
                            </span>
                        </div>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ route('cms.post', $post->slug) }}" class="read-more">
                            Read More
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        @endif

        @else
        <!-- Less than 3 posts - simple grid -->
        <div class="blog-regular-grid">
            @foreach($posts as $post)
                <article class="blog-card reveal">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="blog-card-img" alt="{{ $post->title }}">
                    @else
                        <div class="blog-card-img-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    @endif
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span class="blog-card-date">
                                <i class="far fa-calendar"></i>
                                {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') ?? 'N/A' }}
                            </span>
                        </div>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ route('cms.post', $post->slug) }}" class="read-more">
                            Read More
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        @endif

        <div class="blog-pagination">
            {{ $posts->links() }}
        </div>
    @else
        <div class="empty-state-container" style="margin-top:40px;">
            <div class="empty-state">
                <i class="fas fa-newspaper"></i>
                <h5 class="mb-2">No blog posts yet</h5>
                <p class="mb-0">We are preparing valuable stories and updates for you.</p>
            </div>
        </div>
    @endif
</div>
@endsection
