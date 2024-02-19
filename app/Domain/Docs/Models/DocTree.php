<?php

namespace App\Domain\Docs\Models;

use App\Domain\Docs\Enum\SheetType;
use App\Domain\Docs\HasCategoriesAndPages;
use App\Domain\Docs\Sheets\DocsPage;
use Illuminate\Support\Collection;
use Spatie\Sheets\Sheet;
use Spatie\Sheets\Sheets;

class DocTree
{
    use HasCategoriesAndPages;

    public Collection $categories;

    public Collection $pages;

    public Collection $flatPages;

    public Collection $flatCategories;

    public function __construct()
    {
        $this->categories = new Collection();
        $this->pages = new Collection();
        $this->flatPages = new Collection();
        $this->flatCategories = new Collection();
    }

    public static function build(): self
    {
        $docTree = new self();

        $docs = resolve(Sheets::class)->collection('docs')->all()->sortBy('weight');

        $docs->each(fn ($doc) => $docTree->add($doc));

        $docTree->sort();

        return $docTree;
    }

    public function add(Sheet $doc): void
    {
        if (count($doc->parts) === 1) {
            return;
        }

        $category = $this;

        for ($i = 0; $i < count($doc->parts) - 1; $i++) {
            $category = $category->childCategory($doc->parts[$i]);
        }

        if ($doc->type === SheetType::Category) {
            $category->weight = $doc->weight;
            $category->title = $doc->menuTitle ?? $doc->title;
            $category->slug = str_replace('/_index', '', $doc->slug);
            return;
        }

        $category->pages->add($doc);
        $this->flatCategories->put($category->slug, $category);
        $this->flatPages->put($doc->slug, $doc);
    }

    public function find(string $slug): ?DocsPage
    {
        return $this->flatPages->get($slug);
    }

    public function findCategory(string $slug): ?Category
    {
        return $this->flatCategories->get($slug);
    }
}
