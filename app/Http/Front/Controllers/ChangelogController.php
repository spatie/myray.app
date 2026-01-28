<?php

namespace App\Http\Front\Controllers;

use App\Actions\FetchChangelogAction;
use App\Actions\ParseChangelogAction;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class ChangelogController
{
    public function __invoke(
        FetchChangelogAction $fetchChangelog,
        ParseChangelogAction $parseChangelog,
    ): View {
        $versions = Cache::flexible(
            key: 'changelog-versions',
            ttl: [now()->addMinutes(15), now()->addHour()],
            callback: function () use ($fetchChangelog, $parseChangelog) {
                $markdown = $fetchChangelog->execute(
                    owner: 'spatie',
                    repo: 'ray-app',
                    branch: 'v3/release',
                );

                return $parseChangelog->execute($markdown);
            },
        );

        return view('changelog.show', [
            'versions' => $versions,
        ]);
    }
}
