<?php

namespace App\Http\Front\Controllers;

use App\Actions\FetchChangelogAction;
use App\Actions\ParseChangelogAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ChangelogWebhookController
{
    public function __invoke(
        FetchChangelogAction $fetchChangelog,
        ParseChangelogAction $parseChangelog,
    ): JsonResponse {
        Cache::forget('changelog-versions');

        $markdown = $fetchChangelog->execute(
            owner: 'spatie',
            repo: 'ray-app',
            branch: 'main',
        );

        $versions = $parseChangelog->execute($markdown);

        Cache::flexible(
            key: 'changelog-versions',
            ttl: [now()->addMinutes(15), now()->addHours(5)],
            callback: fn () => $versions,
        );

        return response()->json([
            'success' => true,
            'versions_count' => $versions->count(),
        ]);
    }
}
