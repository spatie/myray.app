<?php

namespace App\Console\Commands;

use App\Actions\FetchChangelogAction;
use Illuminate\Console\Command;

class FetchChangelogCommand extends Command
{
    protected $signature = 'app:fetch-changelog
                            {owner : The repository owner (e.g., spatie)}
                            {repo : The repository name (e.g., laravel-ray)}
                            {--branch=main : The branch to fetch from}
                            {--path=CHANGELOG.md : Path to the changelog file}';

    protected $description = 'Fetches a CHANGELOG.md file from a GitHub repository.';

    public function handle(FetchChangelogAction $action): void
    {
        $owner = $this->argument('owner');
        $repo = $this->argument('repo');
        $branch = $this->option('branch');
        $path = $this->option('path');

        $this->info("Fetching {$path} from {$owner}/{$repo}@{$branch}...");

        try {
            $content = $action->execute($owner, $repo, $branch, $path);

            $this->line($content);
        } catch (\Exception $e) {
            $this->error("Failed to fetch changelog: {$e->getMessage()}");
        }
    }
}
