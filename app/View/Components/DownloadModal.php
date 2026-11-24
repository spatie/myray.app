<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DownloadModal extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.download.template', [
            'downloadLinkMac' => spatieUrl('https://spatie.be/products/ray/v4/download/macos/latest'),
            'downloadLinkWindows' => spatieUrl('https://spatie.be/products/ray/v4/download/windows/latest'),
            'downloadLinkLinux' => spatieUrl('https://spatie.be/products/ray/v4/download/linux/latest'),
        ]);
    }
}
