<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return view('pages.posts.index');
    }


    public function show(Post $post)
    {
        $this->authorize(PostPolicy::UPDATE, $post);
        return view('pages.posts.show');
    }
}
