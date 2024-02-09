<?php

namespace App\Domain\Docs\Models;

use App\Domain\Docs\Enum\SheetType;
use App\Domain\Docs\HasCategoriesAndPages;
use Illuminate\Support\Collection;
use Spatie\Sheets\Sheet;
use Spatie\Sheets\Sheets;

class DocTree
{
    use HasCategoriesAndPages;

    public Collection $categories;

    public Collection $pages;

    public Collection $flatPages;

    public function __construct()
    {
        $this->categories = new Collection();
        $this->pages = new Collection();
        $this->flatPages = new Collection();
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
            $category->title = $doc->title;
            $category->slug = str_replace('/_index', '', $doc->slug);
            return;
        }

        $category->pages->add($doc);
        $this->flatPages->put($doc->slug, $doc);
    }

    public function find(string $slug)
    {

    }
}
