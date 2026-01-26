<?php

namespace App\Actions;

use GrahamCampbell\GitHub\Facades\GitHub;

class FetchChangelogAction
{
    public function execute(string $owner, string $repo, string $branch = 'main', string $path = 'CHANGELOG.md'): string
    {
        $response = GitHub::repo()->contents()->show($owner, $repo, $path, $branch);

        return base64_decode($response['content']);
    }
}
