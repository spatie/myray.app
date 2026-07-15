<?php

namespace App\Actions;

use App\Support\ChangelogVersion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Throwable;

use function Illuminate\Support\defer;

class GetChangelogAction
{
    public const RefreshAfterMinutes = 15;

    public const SyncLockKey = 'changelog-versions-sync';

    public const SyncLockSeconds = 60;

    public function __construct(
        protected SyncChangelogAction $syncChangelog,
    ) {}

    /** @return Collection<int, ChangelogVersion> */
    public function execute(): Collection
    {
        $versions = Cache::get(SyncChangelogAction::CacheKey);

        if (! $versions instanceof Collection || $versions->isEmpty()) {
            return $this->syncOrReturnEmpty();
        }

        if ($this->isFresh()) {
            return $versions;
        }

        $this->deferSync();

        return $versions;
    }

    /** @return Collection<int, ChangelogVersion> */
    protected function syncOrReturnEmpty(): Collection
    {
        try {
            return $this->syncChangelog->execute();
        } catch (Throwable $exception) {
            report($exception);

            return collect();
        }
    }

    protected function deferSync(): void
    {
        defer(function () {
            Cache::lock(self::SyncLockKey, self::SyncLockSeconds)->get(function () {
                if ($this->isFresh()) {
                    return;
                }

                $this->syncChangelog->execute();
            });
        }, self::SyncLockKey);
    }

    protected function isFresh(): bool
    {
        $syncedAt = Cache::get(SyncChangelogAction::SyncedAtCacheKey);

        if (! is_int($syncedAt)) {
            return false;
        }

        return $syncedAt > now()->subMinutes(self::RefreshAfterMinutes)->timestamp;
    }
}
