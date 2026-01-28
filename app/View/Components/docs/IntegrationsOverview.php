<?php

namespace App\View\Components\docs;

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
        $allDocs = app('sheets')->collection('docs')->all()->sortBy('weight');

        $categories = ['php', 'javascript', 'other-languages'];
        $grouped = [];

        foreach ($categories as $category) {
            $categoryDoc = $allDocs->first(fn($doc) =>
                $doc->parts[0] === $category &&
                count($doc->parts) === 2 &&
                $doc->parts[1] === '_index.md'
            );

            $integrations = $allDocs->filter(fn($doc) =>
                count($doc->parts) === 3 &&
                $doc->parts[0] === $category &&
                $doc->parts[2] === '_index.md'
            )->sortBy([
                fn($doc) => $doc->thirdParty ?? false ? 1 : 0,
                ['weight', 'asc'],
            ]);

            $grouped[] = [
                'title' => $categoryDoc?->title ?? ucfirst($category),
                'docs' => $integrations,
            ];
        }

        return view('components.docs.integrations-overview', compact('grouped'));
    }
}
