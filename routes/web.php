<?php

use App\Http\Front\Controllers\DocsController;
use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::redirect('wordpress', '/')->name('wordpress');
Route::redirect('javascript', '/')->name('javascript');

Route::view('terms-of-use', 'legal.terms-of-use')->name('termsOfUse');
Route::view('privacy', 'legal.privacy')->name('privacy');

Route::view('changelog', 'changelog.show')->name('changelog');

Route::view('teaser', 'teaser.show')->name('teaser');

Route::feeds();
Route::get('blog', [PostsController::class, 'index'])->name('blog');
Route::get('blog/{slug}', [PostsController::class, 'detail'])->name('post.show');

Route::get('login', fn() => redirect()->to('/admin/login'))->name('login');

Route::get('docs', [DocsController::class, 'index'])->name('docs.index');
Route::get('docs/{slug}', [DocsController::class, 'show'])->where([
    'slug' => '.*'
])->name('docs.show');
