@extends('web.app')
@section('title', $announcement->title)
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── ANNOUNCEMENT DETAIL HERO ────────────────────── */
    .announce-detail-hero {
      background: #F1FDF3;
      padding: 140px 64px 70px;
      position: relative; overflow: hidden;
    }
    .announce-detail-hero::before {
      content: ''; position: absolute;
      top: -180px; right: -80px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(245,158,11,0.10) 0%, transparent 70%);
      pointer-events: none;
    }
    .announce-detail-hero .breadcrumb-nav {
      display: flex; align-items: center; gap: 8px;
      font-size: 13px; font-weight: 600;
      margin-bottom: 16px;
      position: relative; z-index: 1;
    }
    .announce-detail-hero .breadcrumb-nav a {
      color: var(--text-muted); text-decoration: none;
      transition: color 0.25s;
    }
    .announce-detail-hero .breadcrumb-nav a:hover { color: #d97706; }
    .announce-detail-hero .breadcrumb-nav span { color: rgba(13,34,53,0.25); }
    .announce-detail-hero .breadcrumb-nav .current { color: rgba(13,34,53,0.70); }

    .announce-detail-hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 4vw, 3rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 18px; max-width: 780px;
      line-height: 1.15;
      position: relative; z-index: 1;
    }
    .announce-detail-hero .meta-row {
      display: flex; align-items: center; gap: 16px;
      position: relative; z-index: 1;
    }
    .announce-detail-hero .meta-item {
      display: inline-flex; align-items: center; gap: 6px;
      font-size: 13px; font-weight: 600;
      color: var(--text-muted);
    }
    .announce-detail-hero .meta-item i { color: #d97706; }

    /* ─── CONTENT ─────────────────────────────────────── */
    .announce-detail-content {
      padding: 48px 64px 80px;
      background: var(--cream);
    }
    .announce-detail-shell {
      max-width: 860px;
      margin: 0 auto;
    }
    .announce-detail-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
      overflow: hidden;
      position: relative;
    }
    .announce-detail-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--gold), var(--gold-light));
    }
    .announce-detail-body {
      padding: 40px;
      line-height: 1.85; color: var(--text);
      font-size: 16px;
    }
    .announce-detail-body img {
      max-width: 100%; height: auto;
      border-radius: var(--radius-md);
    }

    .announce-back-row {
      display: flex; justify-content: center;
      margin-top: 36px;
    }

    @media (max-width: 900px) {
      .announce-detail-hero { padding: 120px 24px 50px; }
      .announce-detail-content { padding: 32px 24px 60px; }
      .announce-detail-body { padding: 28px; }
    }
</style>
@endsection

@section('content')
<!-- Announcement Detail Hero -->
<div class="announce-detail-hero">
    <div class="breadcrumb-nav" style="animation: fadeUp 0.6s ease both;">
        <a href="{{ url('/') }}">Home</a>
        <span>/</span>
        <a href="{{ route('cms.announcements') }}">Announcements</a>
        <span>/</span>
        <span class="current">{{ Str::limit($announcement->title, 40) }}</span>
    </div>
    <h1 style="animation: fadeUp 0.7s ease 0.1s both;">{{ $announcement->title }}</h1>
    <div class="meta-row" style="animation: fadeUp 0.7s ease 0.2s both;">
        <span class="tag-pill tag-pill-gold">
            <i class="far fa-calendar"></i>
            {{ $announcement->created_at->format('M d, Y') }}
        </span>
    </div>
</div>

<div class="announce-detail-content">
    <div class="announce-detail-shell">
        <div class="announce-detail-card reveal">
            <div class="announce-detail-body">
                {!! $announcement->content !!}
            </div>
        </div>

        <div class="announce-back-row">
            <a href="{{ route('cms.announcements') }}" class="pill-btn pill-btn-dark">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                Back to Announcements
            </a>
        </div>
    </div>
</div>
@endsection
