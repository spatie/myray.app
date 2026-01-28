<?php

namespace App\Actions;

use App\Support\ChangelogVersion;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ParseChangelogAction
{
    /** @return Collection<int, ChangelogVersion> */
    public function execute(string $markdown): Collection
    {
        $pattern = '/## \[([^\]]+)\] - (\d{4}-\d{2}-\d{2})/';

        preg_match_all($pattern, $markdown, $matches, PREG_OFFSET_CAPTURE);

        $versions = collect();

        foreach ($matches[0] as $index => $match) {
            $version = $matches[1][$index][0];
            $date = Carbon::parse($matches[2][$index][0]);
            $startPos = $match[1] + strlen($match[0]);

            $nextPos = isset($matches[0][$index + 1])
                ? $matches[0][$index + 1][1]
                : strlen($markdown);

            $content = trim(substr($markdown, $startPos, $nextPos - $startPos));

            $versions->push(new ChangelogVersion(
                version: $version,
                date: $date,
                content: $content,
            ));
        }

        return $versions;
    }
}
