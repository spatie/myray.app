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
    public function render(): View|Closure|string
    {
        $navigation = Navigation::build();

        return view('components.docs-navigation', compact('navigation'));
    }
}
