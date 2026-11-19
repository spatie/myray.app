<?php

use App\Http\Front\Controllers\ChangelogController;
use App\Http\Front\Controllers\ChangelogWebhookController;
use App\Http\Front\Controllers\DocsController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\PostsController;
use Illuminate\Http\JsonResponse;
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

// Blog images that had random CMS filenames
Route::redirect('/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/yafa0nhxy3sk3ybg1zf9sv3cnypau07vizfa8ze1.jpg', '/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/ray-create-order-action-debug-output.jpg', 301);
Route::redirect('/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/s0qyxd4y7tlnu8wn3fznylimlds0wbpjxofhvgv5.jpg', '/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/ray-repeated-test-run-output.jpg', 301);
Route::redirect('/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/juecybvsreqxyvexdlllt9xpejvhq2osy79omefr.jpg', '/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/ray-cleared-before-each-test.jpg', 301);
Route::redirect('/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/cy1ygorr449xp6d9swn8nue7l4gnchgiuis0emua.jpg', '/media/blog/ray/automatically-clear-ray-when-running-tests-via-phpunit-or-pest/ray-test-name-as-label.jpg', 301);
Route::redirect('/media/blog/ray/copy-output-from-ray-to-your-clipboard/ysmgfn6gvhvsitbpyp7sxgbwy2yyomdougzhgemq.png', '/media/blog/ray/copy-output-from-ray-to-your-clipboard/ray-copy-to-clipboard-button.png', 301);
Route::redirect('/media/blog/ray/debugging-livewire-components-using-ray/7qa8xp3xk7eafb8kxyblnhvqy0arybae5o6c1uum.jpg', '/media/blog/ray/debugging-livewire-components-using-ray/livewire-search-component-in-browser.jpg', 301);
Route::redirect('/media/blog/ray/debugging-livewire-components-using-ray/cxbtgywgqzkozpdhqhcxkby6pnlkyht99v3qkioj.jpg', '/media/blog/ray/debugging-livewire-components-using-ray/ray-livewire-component-properties.jpg', 301);
Route::redirect('/media/blog/ray/debugging-livewire-components-using-ray/dxeafb5t2liczhqv4bqtjt5lpvjiruvhe2mkrtuq.gif', '/media/blog/ray/debugging-livewire-components-using-ray/ray-livewire-property-live-updates.gif', 301);
Route::redirect('/media/blog/ray/debugging-livewire-components-using-ray/yqvq7wr1jeuqoxxzxvyiftxkebtyrovlau6fyuur.gif', '/media/blog/ray/debugging-livewire-components-using-ray/ray-clear-screen-on-livewire-render.gif', 301);
Route::redirect('/media/blog/ray/easily-inspect-the-contents-of-a-laravel-collection/u5shahlqpzzym9tfihbe482yqrdhzvpjwt26xwcd.jpg', '/media/blog/ray/easily-inspect-the-contents-of-a-laravel-collection/ray-laravel-collection-contents.jpg', 301);
Route::redirect('/media/blog/ray/easily-inspect-the-contents-of-a-laravel-collection/fie7leohmldkbgairdbb5a4herta7bvoy9yof6do.jpg', '/media/blog/ray/easily-inspect-the-contents-of-a-laravel-collection/ray-laravel-collection-chain-steps.jpg', 301);
Route::redirect('/media/blog/ray/expanding-objects-and-array-using-ray/wel2vqjrnsifgi9ysq3siipa6tz6o02oag85ro66.jpg', '/media/blog/ray/expanding-objects-and-array-using-ray/ray-laravel-application-collapsed.jpg', 301);
Route::redirect('/media/blog/ray/expanding-objects-and-array-using-ray/ffhq78bqb4kuetqtismiwyq9ickr5mfs3rln9mgd.jpg', '/media/blog/ray/expanding-objects-and-array-using-ray/ray-expand-rebound-callbacks.jpg', 301);
Route::redirect('/media/blog/ray/expanding-objects-and-array-using-ray/ohwujphoeuo97tigsk2eugjyk9lbs37ncycbtxv1.jpg', '/media/blog/ray/expanding-objects-and-array-using-ray/ray-expand-multiple-properties.jpg', 301);
Route::redirect('/media/blog/ray/expanding-objects-and-array-using-ray/viy9kt5ongobdww7qg8oyialqsze1ytszluwcson.jpg', '/media/blog/ray/expanding-objects-and-array-using-ray/ray-expand-nested-array-key.jpg', 301);
Route::redirect('/media/blog/ray/expanding-objects-and-array-using-ray/6z0yfjhpoieufgvxtjbzig8z6wm0ukddyfcff7gt.jpg', '/media/blog/ray/expanding-objects-and-array-using-ray/ray-expand-array-two-levels.jpg', 301);
Route::redirect('/media/blog/ray/inspecting-the-return-value-of-a-function-using-ray/dsykcfbtqwjxyjkwz6ob4wniw1jyyup6dmvgqlhj.jpg', '/media/blog/ray/inspecting-the-return-value-of-a-function-using-ray/ray-red-output.jpg', 301);
Route::redirect('/media/blog/ray/ray-is-the-best-home-for-nextjs-debugging-output/3uxmgc2ny7ygkayqdffmwh1k64fumujbcmbuhxti.png', '/media/blog/ray/ray-is-the-best-home-for-nextjs-debugging-output/nextjs-debug-output-tweet.png', 301);
Route::redirect('/media/blog/ray/ray-is-the-best-home-for-nextjs-debugging-output/1qcgiitagkkr4yaverkoganrdkbheuf7nlhhs6fb.png', '/media/blog/ray/ray-is-the-best-home-for-nextjs-debugging-output/ray-nextjs-rsc-ssr-browser-logs.png', 301);
Route::redirect('/media/blog/ray/ray-is-the-best-home-for-nextjs-debugging-output/lfdx7j0ruu0eryoo514c2tdvvyzpf2kwxe6focdd.png', '/media/blog/ray/ray-is-the-best-home-for-nextjs-debugging-output/nextjs-env-local-path.png', 301);
Route::redirect('/media/blog/ray/ray-is-the-best-home-for-nextjs-debugging-output/dfsuhsnandbnoswlbkezvz2hjimhissmuz2gar5l.png', '/media/blog/ray/ray-is-the-best-home-for-nextjs-debugging-output/ray-react-component-html-output.png', 301);
Route::redirect('/media/blog/ray/testing-mails-in-laravel-using-ray/lgy4a5cn8rgid3ykxs7jx5jzeouu1gw0ugcwycix.jpg', '/media/blog/ray/testing-mails-in-laravel-using-ray/ray-laravel-password-reset-mail.jpg', 301);
Route::redirect('/media/blog/ray/use-ray-to-find-queries-that-are-slowing-you-down-in-your-laravel-project/cwy0tfoukgzlwimnhbvcvb5kff38c1gdcsenrkva.png', '/media/blog/ray/use-ray-to-find-queries-that-are-slowing-you-down-in-your-laravel-project/ray-slow-mysql-query.png', 301);
Route::redirect('/media/blog/ray/use-ray-trace-to-figure-out-where-a-call-came-from/lir2tj2q43hqula1wcihrah1p9xugpvfmgf3j5ow.png', '/media/blog/ray/use-ray-trace-to-figure-out-where-a-call-came-from/ray-trace-laravel-backtrace.png', 301);

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

Route::prefix('docs')->name('docs.')->group(function () {
    Route::get('/', [DocsController::class, 'index'])->name('index');
    Route::get('/context7.json', function (): JsonResponse {
        return response()->json([
            'url' => 'https://context7.com/websites/myray_app',
            'public_key' => 'pk_HhX3Ptt0SOj5AslquUAbG',
        ]);
    })->name('context7');
    Route::get('/{slug}', [DocsController::class, 'show'])
        ->where('slug', '.*')
        ->name('show');
});
