<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\ProfileController;


Route::post('/set-language', function (Request $request) {
    session(['lang' => $request->lang]);
    return response()->json(['success' => true]);
})->name('set.language');


Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/profile', [ProfileController::class, 'store'])
        ->name('profile.store');
});


require __DIR__.'/auth.php';
require __DIR__.'/candidate.php';
require __DIR__.'/admin.php';
