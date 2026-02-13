<?php

use App\Http\Controllers\Client\CvController;
use App\Http\Controllers\Client\SettingController;
use App\Http\Controllers\Client\JobController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\RouteController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::prefix('client')->group(function () {

        Route::get('/', [RouteController::class, 'index'])->name('client.index');

        Route::get('/jobs', [JobController::class, 'index'])->name('client.jobs.index');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('client.jobs.create');
        Route::post('/jobs/store', [JobController::class, 'store'])->name('client.jobs.store');

        Route::get('/jobs/{jobOffer}', [JobController::class, 'show'])->name('client.jobs.show');
        Route::get('/jobs/{jobOffer}/edit', [JobController::class, 'edit'])->name('client.jobs.edit');
        Route::post('/jobs/{jobOffer}/update', [JobController::class, 'update'])->name('client.jobs.update');
        Route::post('/jobs/{jobOffer}/delete', [JobController::class, 'destroy'])->name('client.jobs.delete');
        Route::get("/job/apply", [JobController::class, 'demandes'])->name('client.jobs.apply');
        Route::post('/jobs/apply/{application}/cancel', [JobController::class, 'annuler'])->name('client.jobs.cancel');

        Route::get('/profile', [ProfileController::class, 'index'])->name('client.profile.index');
        Route::post('/profile', [ProfileController::class, 'store'])->name('client.profile.store');

        Route::get('/settings', [SettingController::class, 'index'])->name('client.settings.index');
        Route::post('/settings', [SettingController::class, 'store'])->name('client.settings.store');

        Route::get("/cv", [CvController::class, 'index'])->name('client.cv.index');

        Route::get("/contrat", [CvController::class, 'contrat'])->name('client.contrat.index');
    });
});

