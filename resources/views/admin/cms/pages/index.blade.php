@extends('admin.cms.layout')

@section('cms-title', 'Pages Management')
@section('cms-description', 'Create, edit, and manage your website pages')
@section('hide-cms-header', true)

@section('cms-content')
<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>CMS</span> PAGES</div>
        <div class="banner-actions">
            <a href="{{ route('admin.cms.pages.create') }}">
                <button class="btn-new">
                    <i class="bi bi-plus-lg"></i>
                    Create New Page
                </button>
            </a>
        </div>
    </div>
    <div class="section-body">
        @if($pages->count() > 0)
            <div class="table-responsive">
                <table class="data-table dt-admin">
                    <thead>
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
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.cms.pages.destroy', $page) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this page?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <p class="mb-0 text-muted">No pages found.</p>
            </div>
        @endif
    </div>
</div>
@endsection