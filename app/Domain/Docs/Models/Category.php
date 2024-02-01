<?php

namespace App\Domain\Docs\Models;

class Category
{
    public array $subCategories = [];

    public array $pages = [];

    public function __construct(
        public string $title = '',
    ) {
    }

    public function childCategory(string $key): Category
    {
        if (! isset($this->subCategories[$key])) {
            $this->subCategories[$key] = new Category($key);
        }

        return $this->subCategories[$key];
    }
}
