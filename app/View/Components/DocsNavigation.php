<?php

namespace App\View\Components;

use App\Domain\Docs\Models\Navigation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Spatie\Sheets\Sheets;

class DocsNavigation extends Component
{
    public function __construct(private readonly Sheets $sheets)
    {
    }

    public function render(): View|Closure|string
    {
        ray('render');

        $navigation = new Navigation();

        $docs = $this->sheets->collection('docs')->all()->sortBy('weight');

        $docs->each(function ($doc) use (&$navigation) {
            $navigation->add($doc);
        });

        ray($navigation);

        return view('components.docs-navigation', compact('navigation'));
    }
}
