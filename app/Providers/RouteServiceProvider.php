<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        $this
            ->mapWebRoutes();

        Route::bind('postSlug', function ($slug) {
            $post = Post::findByIdSlug($slug);

            if (! $post) {
                abort(404);
            }

            if (auth()->user()) {
                return $post;
            }

            if ($post->preview_secret === request()->get('preview_secret')) {
                return $post;
            }

            if (! $post->published) {
                abort(404);
            }

            return $post;
        });
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')->group(base_path('routes/web.php'));

        return $this;
    }
}
