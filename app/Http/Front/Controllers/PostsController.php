<?php

namespace App\Http\Front\Controllers;

use Spatie\ContentApi\ContentApi;
use Spatie\ContentApi\Data\Post;
use Spatie\Feed\FeedItem;

class PostsController
{
    public function index()
    {
        $posts = ContentApi::getPosts('ray', request('page', 1), theme: 'nord');

        return view('front.blog.index', [
            'posts' => $posts,
        ]);
    }

    public function detail(string $slug)
    {
        $post = ContentApi::getPost('ray', $slug, theme: 'nord');

        abort_unless($post, 404);

        return view('front.blog.show', [
            'post' => $post,
        ]);
    }

    public static function getFeedItems()
    {
        return ContentApi::getPosts('ray', 1, 10_000, theme: 'nord')->map(function (Post $post) {
            return FeedItem::create()
                ->id($post->slug)
                ->title($post->title)
                ->summary($post->summary)
                ->updated($post->updated_at)
                ->link(action([self::class, 'detail'], $post->slug))
                ->authorName($post->authors->first()?->name);
        });
    }
}
