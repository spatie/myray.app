<?php

namespace App\Http\Front\Controllers;

use App\Domain\Docs\Models\Navigation;
use Spatie\Sheets\Sheets;

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
        $page = sheets()->collection('docs')->get($slug);

        return view('front.docs.index', compact('page'));
    }
}
