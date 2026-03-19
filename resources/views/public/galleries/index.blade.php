@extends('public.layout')

@section('styles')
<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.25rem;
    }

    .gallery-card {
        border: 1px solid var(--border);
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .gallery-tile {
        position: relative;
        overflow: hidden;
        cursor: pointer;
        height: 240px;
    }

    .gallery-tile img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .35s ease;
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(15, 23, 42, 0.84), rgba(15, 23, 42, 0.10));
        display: flex;
        align-items: flex-end;
        padding: 1rem;
        color: #fff;
        opacity: 0;
        transition: opacity .25s ease;
    }

    .gallery-card:hover .gallery-overlay { opacity: 1; }
    .gallery-card:hover .gallery-tile img { transform: scale(1.06); }

    .gallery-meta {
        padding: .9rem 1rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: var(--text-muted);
    }

    .gallery-meta a {
        color: var(--green);
        font-weight: 700;
        text-decoration: none;
    }
</style>
@endsection

@section('page-content')
<div class="page-header-container">
    <h1 class="page-title">Photo Galleries</h1>
    <p class="page-subtitle">Explore our photo galleries and memories from across the programme.</p>
</div>

@if($galleries->count() > 0)
    <div class="gallery-grid">
        @foreach($galleries as $gallery)
            @php
                $cover = $gallery->images->first();
            @endphp
            <div class="gallery-card">
                <div class="gallery-tile" @if($cover) data-bs-toggle="modal" data-bs-target="#galleryLightbox" data-image="{{ asset('storage/' . $cover->image_path) }}" data-title="{{ $gallery->title }}" data-date="{{ $gallery->created_at->format('M d, Y') }}" @endif>
                    @if($cover)
                        <img src="{{ asset('storage/' . $cover->image_path) }}" alt="{{ $gallery->title }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center" style="height:240px;background:#cbd5e1;color:#1a3a5c;">
                            <i class="fa fa-image fa-2x"></i>
                        </div>
                    @endif
                    <div class="gallery-overlay">
                        <div>
                            <h6 class="mb-1">{{ $gallery->title }}</h6>
                            <small>{{ $gallery->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
                <div class="gallery-meta">
                    <span class="small text-muted"><i class="fa fa-images"></i> {{ $gallery->images->count() }} photos</span>
                    <a href="{{ route('cms.gallery', $gallery->slug) }}">Open</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">{{ $galleries->links() }}</div>
@else
    <div class="empty-state">
        <i class="fa fa-picture-o"></i>
        <h5 class="mb-2">No galleries yet</h5>
        <p class="mb-0">New event photos will appear here once published.</p>
    </div>
@endif

<div class="modal fade" id="galleryLightbox" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <img id="galleryLightboxImage" src="" alt="Gallery image" class="w-100" style="max-height: 78vh; object-fit: cover;">
                <div class="p-3 bg-dark text-white">
                    <h6 id="galleryLightboxTitle" class="mb-1"></h6>
                    <small id="galleryLightboxDate"></small>
                </div>
            </div>
        </div>
    </div>
</div>

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
