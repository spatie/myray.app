<?php

namespace App\Support;

class Feature
{
    public function __construct(
        public string $title,
        public string $description,
        public ?string $link = null,
        public bool $isNew = false,
    ) {
    }
}
