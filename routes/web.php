<?php

use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\PostsController;
use App\Http\Front\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', HomeController::class);

Route::post('subscribe', SubscribeController::class)->middleware(ProtectAgainstSpam::class)->name('subscribe');

Route::redirect('wordpress', '/')->name('wordpress');
Route::redirect('javascript', '/')->name('javascript');

Route::view('terms-of-use', 'front.legal.terms-of-use')->name('termsOfUse');
Route::view('privacy', 'front.legal.privacy')->name('privacy');

Route::feeds();
Route::get('blog', [PostsController::class, 'index'])->name('blog');
Route::get('blog/{postSlug}', [PostsController::class, 'detail'])->name('post.show');
