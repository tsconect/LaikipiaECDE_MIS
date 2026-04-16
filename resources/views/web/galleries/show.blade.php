@extends('web.app')
@section('title', $gallery->title)
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── GALLERY DETAIL HERO ─────────────────────────── */
    .gallery-detail-hero {
      background: #F1FDF3;
      padding: 140px 64px 70px;
      position: relative; overflow: hidden;
    }
    .gallery-detail-hero::before {
      content: ''; position: absolute;
      top: -180px; right: -80px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.05) 0%, transparent 70%);
      pointer-events: none;
    }
    .gallery-detail-hero .breadcrumb-nav {
      display: flex; align-items: center; gap: 8px;
      font-size: 13px; font-weight: 600;
      margin-bottom: 16px;
      position: relative; z-index: 1;
    }
    .gallery-detail-hero .breadcrumb-nav a {
      color: var(--text-muted); text-decoration: none;
      transition: color 0.25s;
    }
    .gallery-detail-hero .breadcrumb-nav a:hover { color: var(--green); }
    .gallery-detail-hero .breadcrumb-nav span { color: rgba(13,34,53,0.25); }
    .gallery-detail-hero .breadcrumb-nav .current { color: rgba(13,34,53,0.70); }

    .gallery-detail-hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 4vw, 3rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 14px;
      position: relative; z-index: 1;
    }
    .gallery-detail-hero .hero-meta {
      display: flex; flex-wrap: wrap; gap: 14px;
      position: relative; z-index: 1;
      margin-bottom: 8px;
    }
    .gallery-detail-hero .meta-chip {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 6px 16px; border-radius: var(--radius-pill);
      background: rgba(13,34,53,0.04);
      border: 1px solid rgba(13,34,53,0.10);
      color: var(--text-muted); font-size: 13px; font-weight: 600;
    }
    .gallery-detail-hero .meta-chip i { color: var(--green); }
    .gallery-detail-hero .hero-desc {
      color: var(--text-muted); font-size: 16px;
      max-width: 600px; line-height: 1.7;
      margin-top: 12px;
      position: relative; z-index: 1;
    }
    .gallery-detail-hero .back-pill {
      margin-top: 20px;
      position: relative; z-index: 1;
    }

    /* ─── PHOTO GRID ──────────────────────────────────── */
    .gallery-detail-content {
      padding: 48px 64px 80px;
      background: var(--cream);
    }

    .photo-masonry {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .photo-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      cursor: pointer;
    }
    .photo-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
    }
    .photo-card img {
      width: 100%; height: 260px;
      object-fit: cover; display: block;
      transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .photo-card:hover img { transform: scale(1.06); }
    .photo-card-caption {
      padding: 14px 18px;
      font-size: 14px; color: var(--text-muted);
    }

    /* Modal override */
    .photo-modal .modal-content {
      border-radius: var(--radius-xl);
      overflow: hidden; border: none;
    }
    .photo-modal .modal-body {
      padding: 0; position: relative;
    }
    .photo-modal img {
      width: 100%; max-height: 80vh;
      object-fit: contain; display: block;
      background: #000;
    }
    .photo-modal .modal-footer {
      background: var(--navy); color: #fff;
      border: none; padding: 16px 24px;
    }

    @media (max-width: 1100px) {
      .photo-masonry { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 900px) {
      .gallery-detail-hero { padding: 120px 24px 50px; }
      .gallery-detail-content { padding: 32px 24px 60px; }
      .photo-masonry { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<!-- Gallery Detail Hero -->
<div class="gallery-detail-hero">
    <div class="breadcrumb-nav" style="animation: fadeUp 0.6s ease both;">
        <a href="{{ url('/') }}">Home</a>
        <span>/</span>
        <a href="{{ route('cms.galleries') }}">Galleries</a>
        <span>/</span>
        <span class="current">{{ $gallery->title }}</span>
    </div>
    <h1 style="animation: fadeUp 0.7s ease 0.1s both;">{{ $gallery->title }}</h1>
    <div class="hero-meta" style="animation: fadeUp 0.7s ease 0.15s both;">
        <span class="meta-chip"><i class="far fa-calendar"></i> {{ $gallery->created_at->format('F d, Y') }}</span>
        <span class="meta-chip"><i class="fas fa-images"></i> {{ $gallery->images->count() }} photos</span>
    </div>
    @if($gallery->description)
        <p class="hero-desc" style="animation: fadeUp 0.7s ease 0.2s both;">{{ $gallery->description }}</p>
    @endif
    <div class="back-pill" style="animation: fadeUp 0.7s ease 0.25s both;">
        <a href="{{ route('cms.galleries') }}" class="pill-btn pill-btn-glass">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
            Back to Galleries
        </a>
    </div>
</div>

<div class="gallery-detail-content">
    @if($gallery->images->count() > 0)
        <div class="photo-masonry">
            @foreach($gallery->images()->orderBy('order')->get() as $image)
                <div class="photo-card reveal" data-bs-toggle="modal" data-bs-target="#imageModal{{ $loop->index }}">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption }}" loading="lazy">
                    @if($image->caption)
                        <div class="photo-card-caption">{{ $image->caption }}</div>
                    @endif
                </div>

                <!-- Image Modal -->
                <div class="modal fade photo-modal" id="imageModal{{ $loop->index }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close position-absolute top-0 end-0 m-3"
                                        data-bs-dismiss="modal" style="z-index: 10; filter: invert(1);"></button>
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid w-100" alt="{{ $image->caption }}">
                            </div>
                            @if($image->caption)
                                <div class="modal-footer">
                                    <p class="mb-0">{{ $image->caption }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state-container">
            <div class="empty-state">
                <i class="fas fa-camera-retro"></i>
                <h5 class="mb-2">No images in this gallery yet</h5>
                <p class="mb-0">Photos will appear here once they are uploaded.</p>
            </div>
        </div>
    @endif
</div>
@endsection
