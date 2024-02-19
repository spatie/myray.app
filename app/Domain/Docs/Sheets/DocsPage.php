<?php

namespace App\Domain\Docs\Sheets;

use Spatie\Sheets\Sheet;

class DocsPage extends Sheet
{
    public function menuTitle(): string
    {
        return $this->menuTitle ?? $this->title;
    }

    public function getUrlAttribute(): string
    {
        $slug = str_replace('.md', '', $this->slug);
        $slug = str_replace('_index', '', $slug);

        return route('docs.show', compact('slug'));
    }
}
