@extends('admin.cms.layout')

@section('cms-title', 'Blog Posts Management')
@section('cms-description', 'Create, edit, and manage your blog posts')

@section('cms-action')
<a href="{{ route('admin.cms.posts.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Create New Post
</a>
@endsection

@section('cms-content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-newspaper"></i> All Posts
    </div>
    <div class="card-body">
        @if($posts->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td><strong>{{ $post->title }}</strong></td>
                            <td>{{ $post->author->first_name ?? 'System' }}</td>
                            <td>
                                <span class="badge-status badge-{{ $post->status }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td>
                                <i class="fas fa-eye"></i> {{ $post->views_count }}
                            </td>
                            <td>
                                <small class="text-muted">{{ $post->published_at?->format('M d, Y') ?? '-' }}</small>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('admin.cms.posts.edit', $post) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.cms.posts.destroy', $post) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} posts
                </div>
                {{ $posts->links() }}
            </div>
        @else
            <div class="alert alert-info text-center py-5">
                <i class="fas fa-info-circle fa-2x mb-3"></i>
                <h5>No posts found</h5>
                <p class="mb-0">Start by <a href="{{ route('admin.cms.posts.create') }}">creating a new post</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
