@extends('admin.cms.layout')

@section('cms-title', 'Edit Blog Post')
@section('cms-description', 'Update your blog post')

@section('cms-content')
<div class="row">
    <div class="col-lg-8">
        <form class="modern-form-shell" action="{{ route('admin.cms.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card mb-4">
                <div class="card-header btn-success">
                    <i class="bi bi-pencil-square"></i> Post Details
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                               name="title" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control editor @error('content') is-invalid @enderror" id="content" 
                                  name="content" rows="10">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header btn-success">
                    <i class="bi bi-image"></i> Featured Image
                </div>
                <div class="card-body">
                    @if($post->featured_image)
                        <div class="mb-3">
                            <p class="small text-muted">Current image:</p>
                            <img src="{{ Storage::url($post->featured_image) }}" alt="Featured" class="img-thumbnail" style="max-width: 300px;">
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Replace Image</label>
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                               id="featured_image" name="featured_image" accept="image/*">
                        @error('featured_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="imagePreview"></div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header btn-success">
                    <i class="bi bi-gear"></i> Settings
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="alert alert-info">
                        <small>
                            <strong>Views:</strong> {{ $post->views_count }}<br>
                            <strong>Published:</strong> {{ $post->published_at?->format('M d, Y - H:i') ?? 'Not published' }}<br>
                            <strong>Updated:</strong> {{ $post->updated_at->format('M d, Y - H:i') }}
                        </small>
                    </div>
                </div>
            </div>

            <div class="mb-4 d-flex justify-content-end gap-2 flex-wrap">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="bi bi-floppy"></i> Update Post
                </button>
                <a href="{{ route('admin.cms.posts.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
            </div>
        </form>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header btn-success">
                <i class="bi bi-info-circle"></i> Post Info
            </div>
            <div class="card-body small">
                <p><strong>Author:</strong> {{ $post->author->first_name ?? 'System' }}</p>
                <p><strong>Slug:</strong> <code>{{ $post->slug }}</code></p>
                <p><strong>URL:</strong> <code>/blog/{{ $post->slug }}</code></p>
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
                preview.innerHTML = `<div class="mt-3"><p class="small text-muted">New image preview:</p><img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="max-width: 300px;"></div>`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
