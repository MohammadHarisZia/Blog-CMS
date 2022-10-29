<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Jobs\CreatePost;
use App\Jobs\DeletePost;
use App\Jobs\UpdatePost;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        // Post Policy
        return $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    public function store(PostRequest $request)
    {

        $this->dispatchSync(CreatePost::formRequest($request));
        return redirect()->route('admin.posts.index')->with('success', 'Post has been created!');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
            'selectedTags' => old('tags', $post->tags()->pluck('id')->toArray())
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->dispatchSync(UpdatePost::formRequest($post, $request));
        return redirect()->route('admin.posts.index')->with('success', 'Post has been updated!');
    }

    public function destroy(Post $post)
    {
        $this->dispatchSync(new DeletePost($post));
        return redirect()->route('admin.posts.index')->with('success', 'Post has been deleted!');
    }
}
