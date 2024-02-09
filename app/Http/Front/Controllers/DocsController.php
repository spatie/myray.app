<?php

namespace App\Http\Front\Controllers;

use App\Domain\Docs\Enum\SheetType;
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

        return view('front.docs.index', compact('page'));
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

        return view('front.docs.index', compact('page', 'slug'));
    }
}
