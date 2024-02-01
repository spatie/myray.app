<?php

namespace App\Domain\Docs\Sheets;

use Spatie\Sheets\Sheet;

class DocsPage extends Sheet
{
    public function getUrlAttribute(): string
    {
        $slug = str_replace('.md', '', $this->slug);

        return route('docs.index', compact('slug'));
    }
}
