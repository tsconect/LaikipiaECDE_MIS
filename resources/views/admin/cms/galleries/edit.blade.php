@extends('admin.cms.layout')

@section('cms-title', 'Edit Gallery')
@section('cms-description', 'Manage gallery images and settings')

@section('cms-content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header btn-success">
                <i class="fas fa-cog"></i> Gallery Settings
            </div>
            <div class="card-body">
                <form class="modern-form-shell" action="{{ route('admin.cms.galleries.update', $gallery) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Gallery Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                               name="title" value="{{ old('title', $gallery->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $gallery->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="draft" {{ old('status', $gallery->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $gallery->status) === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update Gallery
                    </button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header btn-success">
                <i class="fas fa-images"></i> Gallery Images ({{ $gallery->images()->count() }})
            </div>
            <div class="card-body">
                @if($gallery->images()->count() > 0)
                    <div class="row">
                        @foreach($gallery->images()->orderBy('order')->get() as $image)
                        <div class="col-md-3 mb-3">
                            <div class="position-relative">
                                <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->caption }}" class="img-thumbnail w-100">
                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1" 
                                        data-bs-toggle="modal" data-bs-target="#deleteImageModal{{ $image->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="deleteImageModal{{ $image->id }}" tabindex="-1">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Delete Image</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this image?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.cms.gallery-images.delete', $image) }}" method="POST" class="inline-form modern-form-shell">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No images in this gallery yet.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header btn-success">
                <i class="fas fa-cloud-upload-alt"></i> Upload Images
            </div>
            <div class="card-body">
                <form class="modern-form-shell" action="{{ route('admin.cms.galleries.upload-images', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="images" class="form-label">Select Images</label>
                        <input type="file" class="form-control @error('images.*') is-invalid @enderror" id="images" 
                               name="images[]" multiple accept="image/*" required>
                        <small class="text-muted">Select multiple images to bulk upload</small>
                        @error('images.*')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-upload"></i> Upload Images
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
