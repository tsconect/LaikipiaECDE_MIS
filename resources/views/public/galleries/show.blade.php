@extends('public.layout')

@section('page-content')
<div class="row mb-5">
    <div class="col-lg-9">
        <h1 class="mb-2">{{ $gallery->title }}</h1>
        <p class="text-muted mb-4">
            <i class="fa fa-calendar"></i> {{ $gallery->created_at->format('F d, Y') }}
            <span class="ms-3"><i class="fa fa-images"></i> {{ $gallery->images->count() }} photos</span>
        </p>
        
        @if($gallery->description)
            <p class="lead">{{ $gallery->description }}</p>
        @endif
    </div>
    <div class="col-lg-3">
        <a href="{{ route('cms.galleries') }}" class="btn btn-secondary w-100">
            <i class="fa fa-arrow-left"></i> Back to Galleries
        </a>
    </div>
</div>

@if($gallery->images->count() > 0)
    <div class="row g-3">
        @foreach($gallery->images()->orderBy('order')->get() as $image)
            <div class="col-md-4">
                <a href="{{ asset('storage/' . $image->image_path) }}" data-bs-toggle="modal" data-bs-target="#imageModal{{ $loop->index }}">
                    <div class="card shadow-sm overflow-hidden">
                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                             class="card-img-top" alt="{{ $image->caption }}" 
                             style="height: 250px; object-fit: cover; cursor: pointer; transition: transform 0.3s ease;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
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
