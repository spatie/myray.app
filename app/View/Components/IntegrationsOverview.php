<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IntegrationsOverview extends Component
{
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $docs = app('sheets')->collection('docs')->all()->sortBy('weight')->filter(function ($doc) {
            return
                count($doc->parts) === 3 &&
                ($doc->parts[0] === 'php' || $doc->parts[0] === 'javascript' || $doc->parts[0] === 'other-languages') &&
                $doc->parts[count($doc->parts) -1] === '_index.md';
        });

        return view('components.integrations-overview', compact('docs'));
    }
}
