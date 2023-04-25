<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class FlashServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Flash::levels([
            'success' => 'alert-success',
            'error' => 'alert-error',
        ]);
    }
}
