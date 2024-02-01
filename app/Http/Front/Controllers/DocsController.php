<?php

namespace App\Http\Front\Controllers;

use Spatie\Sheets\Sheets;

class DocsController
{
    public function index(Sheets $sheets, string $slug = null)
    {
        $docs = $sheets->collection('docs')->all()->sortBy('weight');

        return view('front.docs.index', compact('docs'));
    }
}
