@extends('admin.cms.layout')

@section('cms-title', 'Pages Management')
@section('cms-description', 'Create, edit, and manage your website pages')

@section('cms-action')
<a href="{{ route('admin.cms.pages.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Create New Page
</a>
@endsection

@section('cms-content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-file-alt"></i> All Pages
    </div>
    <div class="card-body">
        @if($pages->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                        <tr>
                            <td>
                                <strong>{{ $page->title }}</strong>
                            </td>
                            <td>
                                <code>{{ $page->slug }}</code>
                            </td>
                            <td>
                                {{ $page->creator->first_name ?? 'System' }}
                            </td>
                            <td>
                                <span class="badge-status badge-{{ $page->status }}">
                                    {{ ucfirst($page->status) }}
                                </span>
                            </td>
                            <td>
                                <small class="text-muted">{{ $page->created_at->format('M d, Y') }}</small>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('admin.cms.pages.edit', $page) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $page->id }}" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal{{ $page->id }}" tabindex="-1">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Delete Page</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this page? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.cms.pages.destroy', $page) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Showing {{ $pages->firstItem() }} to {{ $pages->lastItem() }} of {{ $pages->total() }} pages
                </div>
                {{ $pages->links() }}
            </div>
        @else
            <div class="alert alert-info text-center py-5">
                <i class="fas fa-info-circle fa-2x mb-3"></i>
                <h5>No pages found</h5>
                <p class="mb-0">Start by <a href="{{ route('admin.cms.pages.create') }}">creating a new page</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
