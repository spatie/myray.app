<?php

namespace App\Http\Front\Controllers;

use App\Actions\SyncChangelogAction;
use Illuminate\Http\JsonResponse;

class ChangelogWebhookController
{
    public function __invoke(SyncChangelogAction $syncChangelog): JsonResponse
    {
        $versions = $syncChangelog->execute();

        return response()->json([
            'success' => true,
            'versions_count' => $versions->count(),
        ]);
    }
}
