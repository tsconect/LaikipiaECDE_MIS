@extends('web.app')
@section('title', 'Announcements')
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── ANNOUNCEMENTS HERO ──────────────────────────── */
    .announce-hero {
      background: #F1FDF3;
      padding: 72px 64px 32px;
      position: relative; overflow: hidden;
    }
    .announce-hero::before {
      content: ''; position: absolute;
      top: -180px; right: -100px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.04) 0%, transparent 70%);
      pointer-events: none;
    }
    .announce-hero::after {
      content: ''; position: absolute;
      bottom: -120px; left: 10%;
      width: 350px; height: 350px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.03) 0%, transparent 70%);
      pointer-events: none;
    }
    .announce-hero .page-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.2rem, 4vw, 3.1rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 10px;
      position: relative; z-index: 1;
    }
    .announce-hero .page-subtitle {
      color: var(--text-muted);
      font-size: 15px; max-width: 520px; line-height: 1.55;
      position: relative; z-index: 1;
    }
    .announce-hero .hero-icon {
      position: absolute; right: 80px; top: 50%;
      transform: translateY(-50%);
      font-size: 180px; color: rgba(13,34,53,0.06);
      pointer-events: none; z-index: 0;
    }
    .announce-hero .floating-asset {
      position: absolute; right: 60px; bottom: -30px;
      height: 170px; z-index: 0;
      animation: floatBounce 6s ease-in-out infinite;
      filter: drop-shadow(0 20px 40px rgba(0,0,0,0.20));
      pointer-events: none;
    }

    /* ─── CONTENT ─────────────────────────────────────── */
    .announce-content {
      padding: 48px 64px 80px;
      background: var(--cream);
    }

    .announce-bento {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
    }

    .announce-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      display: flex; flex-direction: column;
      position: relative;
    }
    .announce-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--gold), var(--gold-light));
      border-radius: var(--radius-xl) var(--radius-xl) 0 0;
    }
    .announce-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
    }

    .announce-card-img {
      width: 100%; height: 200px;
      object-fit: cover; display: block;
    }
    .announce-card-img-placeholder {
      width: 100%; height: 200px;
      background: linear-gradient(135deg, rgba(245,158,11,0.06) 0%, rgba(13,34,53,0.04) 100%);
      display: flex; align-items: center; justify-content: center;
    }
    .announce-card-img-placeholder i { font-size: 2.5rem; color: rgba(245,158,11,0.20); }

    .announce-card-body {
      padding: 28px; flex: 1;
      display: flex; flex-direction: column;
    }
    .announce-card-meta {
      display: flex; align-items: center; gap: 10px;
      margin-bottom: 14px;
    }
    .announce-card h3 {
      font-family: 'Space Grotesk', sans-serif;
      font-size: 1.1rem; font-weight: 700;
      color: var(--navy); margin-bottom: 10px;
      line-height: 1.35;
    }
    .announce-card p {
      font-size: 14px; color: var(--text-muted);
      line-height: 1.65; margin-bottom: 20px;
      display: -webkit-box;
      -webkit-line-clamp: 3; line-clamp: 3;
      -webkit-box-orient: vertical; overflow: hidden;
    }
    .announce-card .read-more {
      margin-top: auto;
      display: inline-flex; align-items: center; gap: 8px;
      color: #d97706; font-weight: 700; font-size: 14px;
      text-decoration: none;
      padding: 8px 20px; border-radius: var(--radius-pill);
      background: rgba(245,158,11,0.08);
      border: 1px solid rgba(245,158,11,0.15);
      transition: all 0.3s;
      width: fit-content;
    }
    .announce-card .read-more:hover {
      background: var(--gold); color: #fff;
      border-color: var(--gold);
    }

    .announce-pagination {
      display: flex; justify-content: center;
      margin-top: 48px;
    }

    @media (max-width: 1100px) {
      .announce-bento { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 900px) {
      .announce-hero { padding: 62px 16px 28px; }
      .announce-hero .floating-asset, .announce-hero .hero-icon { display: none; }
      .announce-content { padding: 32px 24px 60px; }
      .announce-bento { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<!-- Announcements Hero -->
<div class="announce-hero">
    <i class="fas fa-bullhorn hero-icon"></i>
    <h1 class="page-title" style="animation: fadeUp 0.7s ease both;">Announcements</h1>
    <p class="page-subtitle" style="animation: fadeUp 0.7s ease 0.1s both;">Latest news and important updates from our team.</p>
    <img src="{{ asset('assets/images/___12_-removebg-preview.png') }}"
         alt="" class="floating-asset" loading="lazy">
</div>

<div class="announce-content">
    @if($announcements->count() > 0)
        <div class="announce-bento">
            @foreach($announcements as $announcement)
                <article class="announce-card reveal">
                    @if($announcement->image)
                        <img src="{{ asset('storage/' . $announcement->image) }}" class="announce-card-img" alt="{{ $announcement->title }}">
                    @else
                        <div class="announce-card-img-placeholder">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                    @endif
                    <div class="announce-card-body">
                        <div class="announce-card-meta">
                            <span class="tag-pill tag-pill-gold">
                                <i class="far fa-calendar"></i>
                                {{ $announcement->start_date->format('M d, Y') }}
                            </span>
                        </div>
                        <h3>{{ $announcement->title }}</h3>
                        <p>{{ Str::limit(strip_tags($announcement->content), 120) }}</p>
                        <a href="{{ route('cms.announcement.show', $announcement->id) }}" class="read-more">
                            Read More
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="announce-pagination">
            {{ $announcements->links() }}
        </div>
    @else
        <div class="empty-state-container" style="margin-top:40px;">
            <div class="empty-state">
                <i class="fas fa-bullhorn"></i>
                <h5 class="mb-2">No announcements yet</h5>
                <p class="mb-0">Important notices and updates will be posted here soon.</p>
            </div>
        </div>
    @endif
</div>
@endsection
