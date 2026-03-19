@extends('admin.cms.layout')

@section('cms-title', 'Galleries Management')
@section('cms-description', 'Create and manage photo galleries')

@section('cms-action')
<a href="{{ route('admin.cms.galleries.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Create Gallery
</a>
@endsection

@section('cms-content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-images"></i> All Galleries
    </div>
    <div class="card-body">
        @if($galleries->count() > 0)
            <div class="row">
                @foreach($galleries as $gallery)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-title">{{ $gallery->title }}</h6>
                            <p class="card-text text-muted small">{{ Str::limit($gallery->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small>
                                    <i class="fas fa-image"></i> {{ $gallery->images()->count() }} images
                                </small>
                                <small>
                                    <span class="badge badge-{{ $gallery->status }}">{{ ucfirst($gallery->status) }}</span>
                                </small>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
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
                                <form action="{{ route('admin.cms.galleries.destroy', $gallery) }}" method="POST" style="display:inline;">
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

            {{ $galleries->links() }}
        @else
            <div class="alert alert-info">No galleries found. <a href="{{ route('admin.cms.galleries.create') }}">Create one</a></div>
        @endif
    </div>
</div>
@endsection
