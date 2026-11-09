<?php

namespace App\Http\Front\Controllers;

use App\Domain\Blog\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Spatie\Feed\FeedItem;

class PostsController
{
    public function index(): View
    {
        return view('blog.index', [
            'posts' => $this->paginatedPosts(),
        ]);
    }

    public function loadMore(): View
    {
        return view('blog.partials.posts', [
            'posts' => $this->paginatedPosts(),
        ]);
    }

    public function detail(string $slug): View|RedirectResponse
    {
        $post = Post::all()->firstWhere('slug', $slug);

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
        return Post::all()->map(function (Post $post) {
            $content = preg_replace_callback(
                '/\b(src|href|poster)="(\/(?!\/)[^"]*)"/',
                fn (array $match) => $match[1].'="'.url($match[2]).'"',
                $post->content,
            );

            return FeedItem::create()
                ->id($post->slug)
                ->title($post->title)
                ->summary($content)
                ->updated($post->updated_at)
                ->link(route('blog.show', $post->slug))
                ->authorName($post->authors[0]['name']);
        });
    }

    protected function paginatedPosts(): Paginator
    {
        $page = Paginator::resolveCurrentPage();

        return new Paginator(
            Post::all()->slice(($page - 1) * 8, 9)->values(),
            perPage: 8,
            currentPage: $page,
            options: ['path' => Paginator::resolveCurrentPath()],
        );
    }
}
