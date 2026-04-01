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
                    <i class="bi bi-plus-lg"></i>
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
                                    <i class="bi bi-image"></i> {{ $gallery->images()->count() }} images
                                </small>
                                <small>
                                    <span class="badge-status badge-{{ $gallery->status }}">{{ ucfirst($gallery->status) }}</span>
                                </small>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.cms.galleries.edit', $gallery) }}" class="btn btn-sm btn-warning me-2">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('admin.cms.galleries.destroy', $gallery) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this gallery and all associated images?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Gallery">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
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
                    <i class="bi bi-images"></i>
                </div>
                <p>No galleries found yet. <a href="{{ route('admin.cms.galleries.create') }}">Create one now</a>.</p>
            </div>
        @endif
    </div>
</div>
@endsection
