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
            'downloadLinkMacArm64' => spatieUrl('https://spatie.be/products/ray/v3/download/macos-arm64/latest'),
            'downloadLinkMacX64' => spatieUrl('https://spatie.be/products/ray/v3/download/macos-x64/latest'),
            'downloadLinkWindows' => spatieUrl('https://spatie.be/products/ray/v3/download/windows/latest'),
            'downloadLinkLinux' => spatieUrl('https://spatie.be/products/ray/v3/download/linux/latest'),
        ]);
    }
}
