<?php

namespace App\Console\Commands;

use App\Domain\Docs\Jobs\WarmCacheJob;
use Illuminate\Console\Command;

class WarmCacheCommand extends Command
{
    protected $signature = 'app:warm-cache';

    protected $description = 'Warms the cache for the docs.';

    public function handle()
    {
        dispatch(new WarmCacheJob());
    }
}
