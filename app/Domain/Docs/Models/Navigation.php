<?php

namespace App\Domain\Docs\Models;

use App\Domain\Docs\Enum\SheetType;
use Spatie\Sheets\Sheet;

class Navigation
{
    public Category $topCategory;

    public function __construct()
    {
        $this->topCategory = new Category();
    }

    public static function build(): self
    {
        $navigation = new self();

        $docs = app('sheets')->collection('docs')->all()->sortBy('weight');

        $docs->each(function ($doc) use (&$navigation) {
            $navigation->add($doc);
        });

        $navigation->sortCategories();

        return $navigation;
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

        if ($doc->type === SheetType::Category) {
            $category->weight = $doc->weight;
            $category->title = $doc->title;
            $category->slug = str_replace('/_index', '', $doc->slug);
            return;
        }

        $category->pages[] = $doc;
    }

    public function sortCategories(): self
    {
        $this->topCategory->sortCategories();
        return $this;
    }
}
