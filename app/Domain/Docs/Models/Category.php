<?php

namespace App\Domain\Docs\Models;

class Category
{
    // @var array<string, Category>
    public array $subCategories = [];

    public array $pages = [];

    public int $weight = 99;

    public string $title = '<no title>';

    public function childCategory(string $key): Category
    {
        if (! isset($this->subCategories[$key])) {
            $this->subCategories[$key] = new Category($key);
        }

        return $this->subCategories[$key];
    }

    public function sortCategories(): void
    {
        uasort($this->subCategories, function ($a, $b) {
            return $a->weight <=> $b->weight;
        });

        foreach ($this->subCategories as $subCategory) {
            $subCategory->sortCategories();
        }
    }
}
