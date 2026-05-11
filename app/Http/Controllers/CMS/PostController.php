<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            $isAdminRole = strtolower((string) ($user->role ?? '')) === 'admin' || (method_exists($user, 'hasRole') && $user->hasRole('admin'));
            $canManageCms = $user->can('manage-cms');

            if (!$isAdminRole && !$canManageCms) {
                abort(403, 'User does not have the right permissions.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $posts = Post::with('author')->paginate(15);
        log_user_activity(0, 'posts', 'index', 'User accessed the posts index page', 'admin/cms/posts');
        return view('admin.cms.posts.index', compact('posts'));
    }

    public function create()
    {
        log_user_activity(0, 'posts', 'create', 'User accessed the posts create page', 'admin/cms/posts/create');
        return view('admin.cms.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $slug = Str::slug($request->title);

        $data = $request->only(['title', 'content', 'status']);
        $data['slug'] = $slug;
        $data['author_id'] = auth()->id();
        $data['views_count'] = 0;

        if ($request->status === 'published') {
            $data['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post = Post::create($data);

        log_user_activity($post->id, 'posts', 'store', 'User created a new post: ' . $post->title, url()->current(), json_encode($post));

        return redirect()->route('admin.cms.posts.index')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        log_user_activity($post->id, 'posts', 'edit', 'User accessed edit page for post: ' . $post->title, 'admin/cms/posts/' . $post->id . '/edit', json_encode($post));
        return view('admin.cms.posts.edit', compact('post'));
    }

    public function show(Post $post)
    {
        log_user_activity($post->id, 'posts', 'show', 'User viewed post with id ' . $post->id, url()->current(), json_encode($post));
        return view('admin.cms.posts.show', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $current_object = json_encode($post);

        $data = $request->only(['title', 'content', 'status']);

        if ($request->title !== $post->title) {
            $data['slug'] = Str::slug($request->title);
        }

        if ($request->status === 'published' && !$post->published_at) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post->update($data);

        log_user_activity($post->id, 'posts', 'update', 'User updated post with id ' . $post->id, url()->current(), json_encode($post), $current_object);

        return redirect()->route('admin.cms.posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $oldPost = json_encode($post);
        $postId = $post->id;
        $post->delete();
        log_user_activity($postId, 'posts', 'destroy', 'User deleted post with id ' . $postId, url()->current(), null, $oldPost);
        return redirect()->route('admin.cms.posts.index')->with('success', 'Post deleted successfully');
    }
}
