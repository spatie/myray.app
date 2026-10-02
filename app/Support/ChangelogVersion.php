<?php

namespace App\Support;

use Carbon\Carbon;

class ChangelogVersion
{
    public function __construct(
        public string $version,
        public Carbon $date,
        public string $content,
    ) {}

    public function isMajorRelease(): bool
    {
        return preg_match('/^\d+\.0\.0$/', $this->version) === 1;
    }

    public function isBeta(): bool
    {
        return str_contains($this->version, 'beta');
    }
}
