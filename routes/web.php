<?php

use App\Http\Front\Controllers\HomeController;
use App\Http\Front\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', HomeController::class);

Route::post('subscribe', SubscribeController::class)->middleware(ProtectAgainstSpam::class)->name('subscribe');

Route::get('wordpress', HomeController::class)->name('wordpress');
Route::get('javascript', HomeController::class)->name('javascript');

Route::view('terms-of-use', 'front.legal.terms-of-use')->name('termsOfUse');
Route::view('privacy', 'front.legal.privacy')->name('privacy');
