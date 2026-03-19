@extends('admin.cms.layout')

@section('cms-title', 'Create New Blog Post')
@section('cms-description', 'Write and publish a new blog post')

@section('cms-action')
<a href="{{ route('admin.cms.posts.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Back
</a>
@endsection

@section('cms-content')
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('admin.cms.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-pencil-alt"></i> Post Details
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                               name="title" value="{{ old('title') }}" placeholder="Enter post title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control editor @error('content') is-invalid @enderror" id="content" 
                                  name="content" rows="10" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-image"></i> Featured Image
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                               id="featured_image" name="featured_image" accept="image/*">
                        <small class="text-muted">Supported formats: JPEG, PNG, JPG, GIF (Max 2MB)</small>
                        @error('featured_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="imagePreview"></div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-cog"></i> Settings
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-save"></i> Create Post
                </button>
                <a href="{{ route('admin.cms.posts.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
            </div>
        </form>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-lightbulb"></i> Tips
            </div>
            <div class="card-body small">
                <p><strong>Tip:</strong> Write compelling titles to attract readers.</p>
                <p><strong>Tip:</strong> Set as published to make the post visible.</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('featured_image').addEventListener('change', function() {
        const preview = document.getElementById('imagePreview');
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<div class="mt-3"><img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="max-width: 300px;"></div>`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
