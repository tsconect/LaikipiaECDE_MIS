@extends('public.layout')

@section('page-content')

<div class="mb-4">
    <h1 class="mb-2">Blog</h1>
    <p class="lead">Latest articles and updates</p>
</div>

@if($posts->count() > 0)
    <div class="row g-4">
        @foreach($posts as $post)
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card h-100" style="border-top:4px solid #1a3a5c;">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 210px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <span class="badge badge-green mb-2 align-self-start">Blog</span>
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="small text-muted mb-2">
                            <i class="fa fa-calendar"></i> {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') ?? 'N/A' }}
                        </p>
                        <p class="card-text">{{ Str::limit(strip_tags($post->content), 130) }}</p>
                        <a href="{{ route('cms.post', $post->slug) }}" class="mt-auto text-decoration-none fw-semibold">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@else
    <div class="empty-state">
        <i class="fa fa-newspaper-o"></i>
        <h5 class="mb-2">No blog posts yet</h5>
        <p class="mb-0">We are preparing valuable stories and updates for you.</p>
    </div>
@endif
@endsection
