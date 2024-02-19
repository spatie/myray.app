<?php

namespace App\Domain\Docs;

use App\Domain\Docs\Models\Category;
use App\Domain\Docs\Sheets\DocsPage;

trait HasCategoriesAndPages
{
    public function sort(): void
    {
        $this->categories = $this->categories->sortBy('weight');
        $this->pages = $this->pages->sortBy('weight');

        foreach ($this->categories as $subCategory) {
            $subCategory->sort();
        }
    }

    public function firstPage(): ?DocsPage
    {
        if ($this->pages->count() > 0) {
            return $this->pages->first();
        }

        /** @var Category $subCategory */
        $subCategory = $this->categories->first();

        return $subCategory->firstPage();
    }

    public function childCategory(string $key): Category
    {
        if (! $this->categories->has($key)) {
            $this->categories->put($key, new Category());
        }

        return $this->categories->get($key);
    }
}
