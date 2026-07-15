<?php

namespace App\Actions;

use App\Support\ChangelogVersion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class SyncChangelogAction
{
    public const CacheKey = 'changelog-versions';

    public const SyncedAtCacheKey = 'changelog-versions-synced-at';

    public function __construct(
        protected FetchChangelogAction $fetchChangelog,
        protected ParseChangelogAction $parseChangelog,
    ) {}

    /** @return Collection<int, ChangelogVersion> */
    public function execute(): Collection
    {
        $markdown = $this->fetchChangelog->execute(
            owner: config('services.github.changelog_owner'),
            repo: config('services.github.changelog_repo'),
            branch: config('services.github.changelog_branch'),
        );

        $versions = $this->parseChangelog->execute($markdown);

        if ($versions->isEmpty()) {
            throw new RuntimeException('The fetched changelog does not contain any releases.');
        }

        Cache::forever(self::CacheKey, $versions);
        Cache::forever(self::SyncedAtCacheKey, now()->timestamp);

        return $versions;
    }
}
