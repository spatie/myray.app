<?php

namespace App\Http\Front\Controllers;

use Spatie\ContentApi\ContentApi;

class PostsController
{
    public function index()
    {
        $posts = ContentApi::getPosts('ray', request('page', 1));

        return view('front.blog.index', [
            'posts' => $posts,
        ]);
    }

    public function detail(string $slug)
    {
        $post = ContentApi::getPost('ray', $slug);

        abort_unless($post, 404);

        return view('front.blog.show', [
            'post' => $post,
        ]);
    }
}
