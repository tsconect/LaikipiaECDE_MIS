@extends('admin.cms.layout')

@section('cms-title', 'Galleries Management')
@section('cms-description', 'Create and manage photo galleries')
@section('hide-cms-header', true)

@section('cms-content')
<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>CMS</span> GALLERIES</div>
        <div class="banner-actions">
            <a href="{{ route('admin.cms.galleries.create') }}">
                <button class="btn-new">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                    Create Gallery
                </button>
            </a>
        </div>
    </div>
    <div class="section-body">
        @if($galleries->count() > 0)
            <div class="row g-4">
                @foreach($galleries as $gallery)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 cms-gallery-card">
                        <div class="card-body">
                            <h6 class="card-title">{{ $gallery->title }}</h6>
                            <p class="card-text text-muted small">{{ Str::limit($gallery->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small>
                                    <i class="fas fa-image"></i> {{ $gallery->images()->count() }} images
                                </small>
                                <small>
                                    <span class="badge-status badge-{{ $gallery->status }}">{{ ucfirst($gallery->status) }}</span>
                                </small>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.cms.galleries.edit', $gallery) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $gallery->id }}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteModal{{ $gallery->id }}" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Delete Gallery</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                This will delete the gallery and all {{ $gallery->images()->count() }} images.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('admin.cms.galleries.destroy', $gallery) }}" method="POST" class="inline-form">
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

            <div class="table-footer mt-3">
                <div class="showing-text">
                    Showing {{ $galleries->firstItem() }} to {{ $galleries->lastItem() }} of {{ $galleries->total() }} galleries
                </div>
                {{ $galleries->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-images"></i>
                </div>
                <p>No galleries found yet. <a href="{{ route('admin.cms.galleries.create') }}">Create one now</a>.</p>
            </div>
        @endif
    </div>
</div>
@endsection
