<?php

use App\Http\Controllers\Candidate\RouteController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [RouteController::class, 'index'])->name('admin.index');
    });
});

