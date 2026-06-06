<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect()->route('index', ['locale' => App::getLocale()]);
});

Route::prefix('{locale}')
    ->where(['locale' => 'fr|en'])
    ->middleware('locale')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\RouteController::class, 'index'])->name('index');
        Route::get('/jobs', [\App\Http\Controllers\RouteController::class, 'jobs'])->name('jobs');
        Route::get('/about', [\App\Http\Controllers\RouteController::class, 'about'])->name('about');
        Route::get('/contact-us', [\App\Http\Controllers\RouteController::class, 'contact'])->name('contact');
        Route::get('/faq', [\App\Http\Controllers\RouteController::class, 'faq'])->name('faq');
    });

require __DIR__.'/auth.php';
require __DIR__.'/candidate.php';
require __DIR__.'/client.php';
require __DIR__.'/admin.php';

