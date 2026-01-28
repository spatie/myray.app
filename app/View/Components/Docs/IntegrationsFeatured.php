<?php

namespace App\View\Components\Docs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IntegrationsFeatured extends Component
{
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $docs = app('sheets')->collection('docs')->all()
            ->filter(fn($doc) =>
                count($doc->parts) === 3 &&
                in_array($doc->parts[0], ['php', 'javascript', 'other-languages']) &&
                $doc->parts[2] === '_index.md' &&
                ($doc->featured ?? false)
            )
            ->sortBy('weight')
            ->take(6);

        return view('components.docs.integrations-featured', compact('docs'));
    }
}
