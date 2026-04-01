@extends('admin.cms.layout')

@section('cms-title', 'Edit Page')
@section('cms-description', 'Update page information')

@section('cms-content')
<div class="row">
    <div class="col-lg-8">
        <form class="modern-form-shell" action="{{ route('admin.cms.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="card mb-4">
                <div class="card-header btn-success">
                    <i class="bi bi-info-circle"></i> Page Information
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Page Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                               name="title" value="{{ old('title', $page->title) }}" placeholder="Enter page title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control editor @error('content') is-invalid @enderror" id="content" 
                                  name="content" rows="8" placeholder="Enter page content" required>{{ old('content', $page->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" 
                                  name="meta_description" rows="3" placeholder="Enter meta description for SEO (max 160 characters)">{{ old('meta_description', $page->meta_description) }}</textarea>
                        <small class="text-muted">Used for search engine results</small>
                        @error('meta_description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="card mb-4">
                <div class="card-header btn-success">
                    <i class="bi bi-image"></i> Featured Image
                </div>
                <div class="card-body">
                    @if($page->featured_image)
                        <div class="mb-3">
                            <p class="text-muted small">Current image:</p>
                            <img src="{{ Storage::url($page->featured_image) }}" alt="Featured" class="img-thumbnail" style="max-width: 300px;">
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Replace Image</label>
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
                <div class="card-header btn-success">
                    <i class="bi bi-gear"></i> Settings
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Select status</option>
                            <option value="draft" {{ old('status', $page->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $page->status) === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="alert alert-info">
                        <small>
                            <strong>Created:</strong> {{ $page->created_at->format('M d, Y - H:i') }}<br>
                            <strong>Last Updated:</strong> {{ $page->updated_at->format('M d, Y - H:i') }}<br>
                            <strong>Author:</strong> {{ $page->creator->first_name ?? 'System' }}
                        </small>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mb-4 d-flex justify-content-end gap-2 flex-wrap">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="bi bi-floppy"></i> Update Page
                </button>
                <a href="{{ route('admin.cms.pages.index') }}" class="btn btn-secondary btn-lg">
                    <i class="bi bi-x-lg"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header btn-success">
                <i class="bi bi-lightbulb"></i> Tips
            </div>
            <div class="card-body">
                <h6>Page URL</h6>
                <p class="small"><code>/page/{{ $page->slug }}</code></p>

                <h6>Status</h6>
                <p class="small"><strong>Draft:</strong> Page is not visible. <strong>Published:</strong> Page is visible on the website.</p>

                <div class="alert alert-warning mt-3">
                    <small><strong>Note:</strong> Changing the title will automatically update the URL slug.</small>
                </div>
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
                        <p class="text-muted small">New image preview:</p>
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
