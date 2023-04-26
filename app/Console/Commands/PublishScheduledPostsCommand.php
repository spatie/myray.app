<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class PublishScheduledPostsCommand extends Command
{
    protected $signature = 'flare:publish-scheduled-posts';

    protected $description = 'Publish scheduled posts';

    public function handle(): void
    {
        Post::scheduled()->get()
            ->reject(fn (Post $post) => $post->published_at->isFuture())
            ->each(function (Post $post)  {
                $post->published = true;

                if (! $post->published_at) {
                    $post->published_at = now();
                }

                $post->save();
            });

        $this->info('All done!');
    }
}
