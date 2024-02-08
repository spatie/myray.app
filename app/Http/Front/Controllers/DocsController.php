<?php

namespace App\Http\Front\Controllers;

use App\Domain\Docs\Enum\SheetType;
use App\Domain\Docs\Models\Navigation;

class DocsController
{
    public function index()
    {
        $navigation = Navigation::build();
        $page = $navigation->topCategory->firstPage();

        return view('front.docs.index', compact('page'));
    }

    public function show(string $slug)
    {
        $docs = sheets()->collection('docs');

        $page = $docs->get($slug);

        if (!$page) {
            // See if we can find a category for this slug.
            $page = $docs->all()->where('category', $slug)->where('type', SheetType::Page)->firstOrFail();

            if (!$page) {
                abort(404);
            }

            return redirect()->away($page->url);
        }

        return view('front.docs.index', compact('page', 'slug'));
    }
}
