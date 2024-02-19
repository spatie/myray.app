<?php

namespace App\Domain\Docs\Models;

use App\Domain\Docs\HasCategoriesAndPages;
use Illuminate\Support\Collection;

class Category
{
    use HasCategoriesAndPages;

    // @var Collection<string, Category>
    public Collection $categories;

    public Collection $pages;

    public int $weight = 99;

    public string $title = '<no title>';

    public string $slug = '';

    public Category $parent;

    public function __construct() {
        $this->categories = new Collection();
        $this->pages = new Collection();
    }
}
