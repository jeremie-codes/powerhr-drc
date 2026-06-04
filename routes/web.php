<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/set-language', function (Request $request) {
    session(['lang' => $request->lang]);
    return response()->json(['success' => true]);
})->name('set.language');


Route::get('/', [\App\Http\Controllers\RouteController::class, 'index'])->name('index');
Route::get('/jobs', [\App\Http\Controllers\RouteController::class, 'jobs'])->name('jobs');
Route::get('/contact-us', [\App\Http\Controllers\RouteController::class, 'contact'])->name('contact');
Route::get('/faq', [\App\Http\Controllers\RouteController::class, 'faq'])->name('faq');

require __DIR__.'/auth.php';
require __DIR__.'/candidate.php';
require __DIR__.'/client.php';
require __DIR__.'/admin.php';

