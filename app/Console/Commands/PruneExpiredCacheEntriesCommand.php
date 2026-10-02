<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PruneExpiredCacheEntriesCommand extends Command
{
    protected $signature = 'app:prune-expired-cache-entries';

    protected $description = 'Delete expired entries from the database cache table.';

    public function handle(): void
    {
        $deletedCount = DB::table(config('cache.stores.database.table'))
            ->where('expiration', '<=', now()->getTimestamp())
            ->delete();

        $this->info("Deleted {$deletedCount} expired cache entries.");
    }
}
