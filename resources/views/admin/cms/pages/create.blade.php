@extends('admin.cms.layout')

@section('cms-title', 'Create New Page')
@section('cms-description', 'Add a new page to your website')

@section('cms-action')
<a href="{{ route('admin.cms.pages.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Back
</a>
@endsection

@section('cms-content')
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('admin.cms.pages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Basic Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Page Information
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Page Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                               name="title" value="{{ old('title') }}" placeholder="Enter page title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control editor @error('content') is-invalid @enderror" id="content" 
                                  name="content" rows="8" placeholder="Enter page content" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" 
                                  name="meta_description" rows="3" placeholder="Enter meta description for SEO (max 160 characters)">{{ old('meta_description') }}</textarea>
                        <small class="text-muted">Used for search engine results</small>
                        @error('meta_description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
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

            <!-- Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-cog"></i> Settings
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Select status</option>
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mb-4">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-save"></i> Create Page
                </button>
                <a href="{{ route('admin.cms.pages.index') }}" class="btn btn-secondary btn-lg">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-lightbulb"></i> Tips
            </div>
            <div class="card-body">
                <h6>Page Title</h6>
                <p class="small">Use a clear, descriptive title that reflects the page content.</p>

                <h6>Content</h6>
                <p class="small">Use the rich text editor to format your content. You can add images, links, and formatting.</p>

                <h6>Meta Description</h6>
                <p class="small">Keep it between 120-160 characters for best display in search results.</p>

                <h6>Status</h6>
                <p class="small"><strong>Draft:</strong> Page is not visible. <strong>Published:</strong> Page is visible on the website.</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Image preview
    document.getElementById('featured_image').addEventListener('change', function() {
        const preview = document.getElementById('imagePreview');
        const file = this.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <div class="mt-3">
                        <img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
