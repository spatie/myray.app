<?php

namespace App\Http\Front\Controllers;

use App\Domain\Docs\Models\DocTree;

class DocsController
{
    private DocTree $docTree;


    public function __construct()
    {
        $this->docTree = DocTree::build();
    }

    public function index()
    {
        $page = $this->docTree->firstPage();

        return redirect()->away($page->url);
    }

    public function show(string $slug)
    {
        $page = $this->docTree->find($slug);

        if (!$page) {
            $category = $this->docTree->findCategory($slug);

            if (!$category) {
                abort(404);
            }

            $page = $category->firstPage();

            if (!$page) {
                abort(404);
            }

            return redirect()->away($page->url);
        }

        $category = $this->docTree->findCategory($page->category);

        $index = $category->pages->search(fn ($p) => $p->slug === $page->slug);

        $prev = $category->pages->get($index - 1);
        $next = $category->pages->get($index + 1);

        $categories = [];
        while($category !== null) {
            $categories[] = $category;
            $category = $category->parent ?? null;
        }
        $categories = array_reverse($categories);

        return view('docs.show', compact('page', 'slug', 'categories', 'prev', 'next'));
    }
}
