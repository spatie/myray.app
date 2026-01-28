<?php

namespace App\Providers;

use App\Models\User;
use App\Support\LifetimeOffer;
use App\Support\Vimeo\Vimeo;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Model::unguard();

        Flash::levels([
            'success' => 'alert-success',
            'error' => 'alert-error',
        ]);

        Blade::directive('markdown', function () {
            return "<?php echo (new \League\CommonMark\CommonMarkConverter())->convertToHtml(<<<HEREDOC";
        });

        Blade::directive('endmarkdown', function () {
            return 'HEREDOC); ?>';
        });

        // Share lifetime offer status with all views
        View::share('lifetimeOfferActive', LifetimeOffer::isActive());
        View::share('lifetimeOfferExpiration', LifetimeOffer::expirationDate());
    }
}
