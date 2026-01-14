<?php

use App\Http\Front\Controllers\DocsController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::redirect('wordpress', '/')->name('wordpress');
Route::redirect('javascript', '/')->name('javascript');

Route::name('legal.')->group(function () {
    Route::view('terms-of-use', 'legal.terms-of-use')->name('terms');
    Route::view('privacy', 'legal.privacy')->name('privacy');
});

Route::view('changelog', 'changelog.show')->name('changelog');
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
