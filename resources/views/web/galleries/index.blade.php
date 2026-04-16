@extends('web.app')
@section('title', 'Galleries')
@section('flush_topbar', '1')

@section('styles')
<style>
    /* ─── GALLERIES HERO ──────────────────────────────── */
    .gallery-hero {
      background: #F1FDF3;
      padding: 72px 64px 32px;
      position: relative; overflow: hidden;
    }
    .gallery-hero::before {
      content: ''; position: absolute;
      top: -180px; right: -100px;
      width: 500px; height: 500px; border-radius: 50%;
      background: radial-gradient(circle, rgba(13,34,53,0.04) 0%, transparent 70%);
      pointer-events: none;
    }
    .gallery-hero .page-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.2rem, 4vw, 3.1rem);
      color: var(--navy); font-weight: 900;
      margin-bottom: 10px;
      position: relative; z-index: 1;
    }
    .gallery-hero .page-subtitle {
      color: var(--text-muted);
      font-size: 15px; max-width: 520px; line-height: 1.55;
      position: relative; z-index: 1;
    }
    .gallery-hero .hero-icon {
      position: absolute; right: 80px; top: 50%;
      transform: translateY(-50%);
      font-size: 180px; color: rgba(13,34,53,0.06);
      pointer-events: none; z-index: 0;
    }
    .gallery-hero .floating-asset {
      position: absolute; right: 50px; bottom: -20px;
      height: 170px; z-index: 0;
      animation: floatBounce 6s ease-in-out infinite;
      filter: drop-shadow(0 20px 40px rgba(0,0,0,0.20));
      pointer-events: none;
    }

    /* ─── GALLERY GRID ────────────────────────────────── */
    .gallery-content {
      padding: 48px 64px 80px;
      background: var(--cream);
    }

    .gallery-bento {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-auto-rows: auto;
      gap: 24px;
    }

    .gallery-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .gallery-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
    }

    .gallery-tile {
      position: relative; overflow: hidden;
      cursor: pointer; height: 220px;
    }
    .gallery-tile img {
      width: 100%; height: 100%;
      object-fit: cover;
      transition: transform .5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .gallery-card:hover .gallery-tile img { transform: scale(1.08); }

    .gallery-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(13,34,53,0.85) 0%, rgba(13,34,53,0.10) 50%, transparent 100%);
      display: flex; align-items: flex-end; padding: 24px;
      color: #fff; opacity: 0;
      transition: opacity .35s; font-size: 14px;
    }
    .gallery-card:hover .gallery-overlay { opacity: 1; }
    .gallery-overlay h6 { font-family: 'Space Grotesk', sans-serif; font-weight: 700; margin-bottom: 4px; }

    .gallery-meta {
      padding: 16px 20px;
      display: flex; justify-content: space-between;
      align-items: center; color: var(--text-muted);
    }
    .gallery-meta .photo-count {
      display: inline-flex; align-items: center; gap: 6px;
      font-size: 13px; font-weight: 600;
    }
    .gallery-meta .open-btn {
      display: inline-flex; align-items: center; gap: 6px;
      color: var(--green); font-weight: 700; font-size: 13px;
      text-decoration: none;
      padding: 6px 18px; border-radius: var(--radius-pill);
      background: rgba(26,124,62,0.08);
      border: 1px solid rgba(26,124,62,0.12);
      transition: all 0.3s;
    }
    .gallery-meta .open-btn:hover {
      background: var(--green); color: #fff;
      border-color: var(--green);
    }

    /* Lightbox modal override */
    #galleryLightbox .modal-content {
      border-radius: var(--radius-xl);
      overflow: hidden; border: none;
    }

    .gallery-pagination {
      display: flex; justify-content: center;
      margin-top: 48px;
    }

    @media (max-width: 1100px) {
      .gallery-bento { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 900px) {
      .gallery-hero { padding: 62px 16px 28px; }
      .gallery-hero .hero-icon, .gallery-hero .floating-asset { display: none; }
      .gallery-content { padding: 32px 24px 60px; }
      .gallery-bento { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<!-- Gallery Hero -->
<div class="gallery-hero">
    <i class="fas fa-camera-retro hero-icon"></i>
    <h1 class="page-title" style="animation: fadeUp 0.7s ease both;">Photo Galleries</h1>
    <p class="page-subtitle" style="animation: fadeUp 0.7s ease 0.1s both;">Explore our photo galleries and memories from across the programme.</p>
    <img src="{{ asset('assets/images/___10_-removebg-preview.png') }}"
         alt="" class="floating-asset" loading="lazy">
</div>

<div class="gallery-content">
    @if($galleries->count() > 0)
        <div class="gallery-bento">
            @foreach($galleries as $gallery)
                @php $cover = $gallery->images->first(); @endphp
                <div class="gallery-card reveal">
                    <div class="gallery-tile"
                         @if($cover)
                            data-bs-toggle="modal" data-bs-target="#galleryLightbox"
                            data-image="{{ asset('storage/' . $cover->image_path) }}"
                            data-title="{{ $gallery->title }}"
                            data-date="{{ $gallery->created_at->format('M d, Y') }}"
                         @endif>
                        @if($cover)
                            <img src="{{ asset('storage/' . $cover->image_path) }}" alt="{{ $gallery->title }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height:220px;background:linear-gradient(135deg, #e2e8f0, #cbd5e1);color:rgba(13,34,53,0.25);">
                                <i class="fa fa-image fa-3x"></i>
                            </div>
                        @endif
                        <div class="gallery-overlay">
                            <div>
                                <h6>{{ $gallery->title }}</h6>
                                <small>{{ $gallery->created_at->format('M d, Y') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-meta">
                        <span class="photo-count">
                            <i class="fas fa-images"></i> {{ $gallery->images->count() }} photos
                        </span>
                        <a href="{{ route('cms.gallery', $gallery->slug) }}" class="open-btn">
                            Open
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="gallery-pagination">{{ $galleries->links() }}</div>
    @else
        <div class="empty-state-container" style="margin-top:40px;">
            <div class="empty-state">
                <i class="fas fa-camera-retro"></i>
                <h5 class="mb-2">No galleries yet</h5>
                <p class="mb-0">New event photos will appear here once published.</p>
            </div>
        </div>
    @endif

    <!-- Lightbox Modal -->
    <div class="modal fade" id="galleryLightbox" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-body p-0 position-relative">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index:10; filter: invert(1);"></button>
                    <img id="galleryLightboxImage" src="" alt="Gallery image" class="w-100" style="max-height: 78vh; object-fit: cover;">
                    <div class="p-3" style="background:var(--navy); color:#fff;">
                        <h6 id="galleryLightboxTitle" class="mb-1"></h6>
                        <small id="galleryLightboxDate" style="color:rgba(255,255,255,0.5);"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const lightbox = document.getElementById('galleryLightbox');
        lightbox?.addEventListener('show.bs.modal', function (event) {
            const trigger = event.relatedTarget;
            document.getElementById('galleryLightboxImage').src = trigger?.dataset.image || '';
            document.getElementById('galleryLightboxTitle').textContent = trigger?.dataset.title || '';
            document.getElementById('galleryLightboxDate').textContent = trigger?.dataset.date || '';
        });
    });
</script>
@endsection
