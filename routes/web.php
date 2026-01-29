<?php

use App\Http\Front\Controllers\ChangelogController;
use App\Http\Front\Controllers\ChangelogWebhookController;
use App\Http\Front\Controllers\DocsController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::redirect('wordpress', '/')->name('wordpress');
Route::redirect('javascript', '/')->name('javascript');

// Docs redirects
Route::redirect('/docs/getting-started/introduction', '/docs/getting-started/installation', 301);
Route::redirect('/docs/getting-started/tips-tricks', '/docs/getting-started/using-ray', 301);
Route::redirect('/docs/environments/remote', '/docs/features/remote', 301);

Route::redirect('/docs/php/vanilla-php/data-types', '/docs/php/vanilla-php/usage#output-formats', 301);
Route::redirect('/docs/php/vanilla-php/customizing-output', '/docs/php/vanilla-php/usage#customizing-output', 301);
Route::redirect('/docs/php/vanilla-php/limiting-output', '/docs/php/vanilla-php/usage#limiting-output', 301);
Route::redirect('/docs/php/vanilla-php/custom', '/docs/php/vanilla-php/usage#custom-functions', 301);
Route::redirect('/docs/php/vanilla-php/phpstan', '/detecting-removing-ray-calls', 301);
Route::redirect('/docs/php/vanilla-php/x-ray', '/detecting-removing-ray-calls', 301);

Route::redirect('/docs/php/laravel/queries', '/docs/php/laravel/usage#debugging-queries', 301);
Route::redirect('/docs/php/laravel/blade', '/docs/php/laravel/usage#using-ray-in-blade-views', 301);

Route::redirect('/docs/features/mcp', '/docs/features/ai', 301);

Route::name('legal.')->group(function () {
    Route::view('terms-of-use', 'legal.terms-of-use')->name('terms');
    Route::view('privacy', 'legal.privacy')->name('privacy');
});

Route::get('changelog', ChangelogController::class)->name('changelog');
Route::post('webhooks/changelog', ChangelogWebhookController::class)
    ->middleware('throttle:6,1')
    ->name('webhooks.changelog');
Route::view('teaser', 'teaser.show')->name('teaser');

Route::feeds();

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('index');
    Route::get('/load-more', [PostsController::class, 'loadMore'])->name('load-more');
    Route::get('/{slug}', [PostsController::class, 'detail'])->name('show');
});

Route::get('login', fn() => redirect()->to('/admin/login'))->name('login');

Route::prefix('docs')->name('docs.')->group(function () {
    Route::get('/', [DocsController::class, 'index'])->name('index');
    Route::get('/{slug}', [DocsController::class, 'show'])
        ->where('slug', '.*')
        ->name('show');
});
