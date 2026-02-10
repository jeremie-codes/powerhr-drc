<?php

use App\Http\Controllers\Candidate\RouteController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:client'])->group(function () {
    Route::prefix('client')->group(function () {
        Route::get('/', [RouteController::class, 'index'])->name('client.index');
    });
});

