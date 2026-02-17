<?php

use App\Http\Controllers\Candidate\CvController;
use App\Http\Controllers\Candidate\SettingController;
use App\Http\Controllers\Candidate\JobController;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\RouteController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:candidate'])->group(function () {
    Route::prefix('candidate')->group(function () {

        Route::get('/', [RouteController::class, 'index'])->name('candidate.index');

        Route::get('/jobs', [JobController::class, 'index'])->name('candidate.jobs.index');
        Route::get('/jobs/{jobOffer}', [JobController::class, 'show'])->name('candidate.jobs.show');
        Route::get("/job/apply", [JobController::class, 'candidatures'])->name('candidate.jobs.apply');
        Route::post('/jobs/apply', [JobController::class, 'postuler'])->name('candidate.jobs.store');
        Route::post('/jobs/apply/{application}/cancel', [JobController::class, 'annuler'])->name('candidate.jobs.cancel');

        Route::get('/profile', [ProfileController::class, 'index'])->name('candidate.profile.index');
        Route::post('/profile', [ProfileController::class, 'store'])->name('candidate.profile.store');

        Route::get('/settings', [SettingController::class, 'index'])->name('candidate.settings.index');
        Route::post('/settings', [SettingController::class, 'store'])->name('candidate.settings.store');

        Route::get("/cv", [CvController::class, 'index'])->name('candidate.cv.index');

    });
});

