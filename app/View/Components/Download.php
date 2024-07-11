<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Download extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.download.template', [
            'downloadLinkMacIntel' => spatieUrl('https://spatie.be/products/ray/download/macosIntel/latest'),
            'downloadLinkMacAppleSilicon' => spatieUrl('https://spatie.be/products/ray/download/macosAppleSilicon/latest'),
            'downloadLinkWindows' => spatieUrl('https://spatie.be/products/ray/download/windows/latest'),
            'downloadLinkLinux' => spatieUrl('https://spatie.be/products/ray/download/linux/latest'),
        ]);
    }
}
