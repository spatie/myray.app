<?php

namespace App\Http\Front\Controllers;

use Spatie\Sheets\Sheets;

class DocsController
{
    public function index(Sheets $sheets)
    {
        $docs = $sheets->collection('docs')->all()->sortBy('weight');

        return view('front.docs.index', compact('docs'));
    }
}
