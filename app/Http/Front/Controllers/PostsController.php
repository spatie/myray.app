<?php

namespace App\Http\Front\Controllers;

use App\Models\Post;

class PostsController
{
    public function index()
    {
        $posts = Post::query()
            ->published()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->simplePaginate(50);

        return view('front.blog.index', [
            'posts' => $posts,
        ]);
    }

    public function detail(Post $post)
    {
        return view('front.blog.show', [
            'post' => $post,
        ]);
    }
}
