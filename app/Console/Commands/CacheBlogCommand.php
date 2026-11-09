<?php

namespace App\Console\Commands;

use App\Domain\Blog\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Spatie\Sheets\Sheets;

class CacheBlogCommand extends Command
{
    protected $signature = 'blog:cache';

    protected $description = 'Render blog Markdown during the build so requests do not need Node.js.';

    public function handle(Sheets $sheets): void
    {
        Cache::store('blog')->flush();

        $posts = $sheets->collection('blog')->all();
        $bytes = $posts->sum(fn (Post $post) => strlen($post->content) + strlen($post->summary));

        $this->info("Cached {$posts->count()} posts ({$bytes} bytes of HTML).");
    }
}
