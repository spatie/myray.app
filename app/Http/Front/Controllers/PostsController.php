<?php

namespace App\Http\Front\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Spatie\ContentApi\ContentApi;
use Spatie\ContentApi\Data\Post;
use Spatie\Feed\FeedItem;

class PostsController
{
    public function index(): View
    {
        $posts = ContentApi::getPosts('ray', request('page', 1), 8, theme: 'nord');

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function loadMore(): View
    {
        $posts = ContentApi::getPosts('ray', request('page', 1), 8, theme: 'nord');

        return view('blog.partials.posts', [
            'posts' => $posts,
        ]);
    }

    public function detail(string $slug): View|RedirectResponse
    {
        $post = ContentApi::getPost('ray', $slug, theme: 'nord');

        if (! $post && is_numeric(explode('-', $slug)[0])) {
            $parts = explode('-', $slug);

            $parts = array_slice($parts, 1);

            return redirect(route('blog.show', implode('-', $parts)), 301);
        }

        abort_if(is_null($post), 404);

        return view('blog.show', [
            'post' => $post,
        ]);
    }

    public static function getFeedItems(): Collection
    {
        return ContentApi::getPosts('ray', 1, 10_000, theme: 'nord')->map(function (Post $post) {
            return FeedItem::create()
                ->id($post->slug)
                ->title($post->title)
                ->summary($post->content)
                ->updated($post->updated_at)
                ->link(route('blog.show', $post->slug))
                ->authorName($post->authors->first()?->name);
        });
    }
}
