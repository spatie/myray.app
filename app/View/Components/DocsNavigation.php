<?php

namespace App\View\Components;

use App\Domain\Docs\Models\DocTree;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DocsNavigation extends Component
{
    public function render(): View|Closure|string
    {
        $navigation = DocTree::build();

        $slug = request()->route()->parameter('slug');

        return view('components.docs-navigation', compact('navigation', 'slug'));
    }
}
