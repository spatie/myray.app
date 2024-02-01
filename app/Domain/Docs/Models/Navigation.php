<?php

namespace App\Domain\Docs\Models;

use Spatie\Sheets\Sheet;

class Navigation
{
    public Category $topCategory;

    public function __construct()
    {
        $this->topCategory = new Category();
    }

    public function add(Sheet $doc): void
    {
        // We won't use top-level docs in the navigation
        if (count($doc->parts) === 1) {
            return;
        }

        $category = $this->topCategory;

        for ($i = 0; $i < count($doc->parts) - 1; $i++) {
            $category = $category->childCategory($doc->parts[$i]);
        }

        $category->pages[] = $doc;
    }
}
