<?php

namespace App\Domain\Docs\Jobs;

use App\Domain\Docs\Models\DocTree;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WarmCacheJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function handle(): void
    {
        $docTree = DocTree::build();

        $docTree->flatPages->each(fn ($page) => dispatch(new WarmCacheForPageJob($page)));
    }
}
