@extends('admin.cms.layout')

@section('cms-title', 'Blog Posts Management')
@section('cms-description', 'Create, edit, and manage your blog posts')
@section('hide-cms-header', true)

@section('cms-content')
<div class="table-card">
    <div class="table-banner">
        <div class="table-banner-title"><span>BLOG</span> POSTS</div>
        <div class="banner-actions">
            <a href="{{ route('admin.cms.posts.create') }}">
                <button class="btn-new">
                    <i class="bi bi-plus-lg"></i>
                    Create New Post
                </button>
            </a>
        </div>
    </div>

    <div class="section-body">
        @if($posts->count() > 0)
            <div class="table-responsive">
                <table class="data-table dt-admin" id="postsTable">
                    <thead>
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
                                <i class="bi bi-eye"></i> {{ $post->views_count }}
                            </td>
                            <td>
                                <small class="text-muted">{{ $post->published_at?->format('M d, Y') ?? '-' }}</small>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('admin.cms.posts.edit', $post) }}" class="btn btn-sm btn-warning" title="Edit Post">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.cms.posts.destroy', $post) }}" method="POST" class="inline-form" onsubmit="return confirm('Are you sure you want to delete this post?')">
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
                <p class="mb-0 text-muted">No posts found.</p>
            </div>
        @endif
    </div>
</div>
@endsection