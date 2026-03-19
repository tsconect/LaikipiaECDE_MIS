@extends('public.layout')

@section('styles')
<style>
    .gallery-detail-head {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        padding: 1.4rem;
        margin-bottom: 1.2rem;
    }

    .gallery-photo-card {
        border: 1px solid var(--border);
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);
        background: #fff;
        height: 100%;
    }

    .gallery-photo-card img {
        height: 240px;
        object-fit: cover;
        width: 100%;
        transition: transform .3s ease;
    }

    .gallery-photo-card:hover img {
        transform: scale(1.05);
    }
</style>
@endsection

@section('page-content')
<div class="gallery-detail-head row g-3 align-items-center">
    <div class="col-lg-8">
        <h1 class="mb-2">{{ $gallery->title }}</h1>
        <p class="text-muted mb-4">
            <i class="fa fa-calendar"></i> {{ $gallery->created_at->format('F d, Y') }}
            <span class="ms-3"><i class="fa fa-images"></i> {{ $gallery->images->count() }} photos</span>
        </p>
        
        @if($gallery->description)
            <p class="lead">{{ $gallery->description }}</p>
        @endif
    </div>
    <div class="col-lg-4">
        <a href="{{ route('cms.galleries') }}" class="btn btn-outline-primary w-100">
            <i class="fa fa-arrow-left"></i> Back to Galleries
        </a>
    </div>
</div>

@if($gallery->images->count() > 0)
    <div class="row g-3">
        @foreach($gallery->images()->orderBy('order')->get() as $image)
            <div class="col-md-4">
                <a href="{{ asset('storage/' . $image->image_path) }}" data-bs-toggle="modal" data-bs-target="#imageModal{{ $loop->index }}">
                    <div class="gallery-photo-card">
                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                             class="card-img-top" alt="{{ $image->caption }}">
                        @if($image->caption)
                            <div class="card-body">
                                <p class="card-text small">{{ $image->caption }}</p>
                            </div>
                        @endif
                    </div>
                </a>
            </div>

            <!-- Image Modal -->
            <div class="modal fade" id="imageModal{{ $loop->index }}" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" style="z-index: 10;"></button>
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
    <div class="alert alert-info">
        <i class="fa fa-info-circle"></i> No images in this gallery yet.
    </div>
@endif
@endsection
