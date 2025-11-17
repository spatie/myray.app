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
            'downloadLinkMac' => spatieUrl('https://spatie.be/products/ray/v3/download/macos/latest'),
            'downloadLinkWindows' => spatieUrl('https://spatie.be/products/ray/v3/download/windows/latest'),
            'downloadLinkLinux' => spatieUrl('https://spatie.be/products/ray/v3/download/linux/latest'),
        ]);
    }
}
