<?php

use App\Http\Controllers\Candidate\CvController;
use App\Http\Controllers\Candidate\SettingController;
use App\Http\Controllers\Candidate\JobController;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\RouteController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('candidate', function () {
    return redirect()->route('candidate.index', ['locale' => App::getLocale()]);
});

Route::prefix('{locale}')
    ->where(['locale' => 'fr|en'])
    ->middleware('locale')
    ->group(function () {
        Route::middleware(['role:candidate,employee'])->group(function () {
            Route::prefix('candidate')->group(function () {

                Route::get('/', [RouteController::class, 'index'])->name('candidate.index');

                Route::get('/jobs', [JobController::class, 'index'])->name('candidate.jobs.index');
                Route::get('/jobs/{jobOffer}', [JobController::class, 'show'])->name('candidate.jobs.show');
                Route::get("/job/apply", [JobController::class, 'candidatures'])->name('candidate.jobs.apply');

                Route::get('/profile', [ProfileController::class, 'index'])->name('candidate.profile.index');

                Route::get('/settings', [SettingController::class, 'index'])->name('candidate.settings.index');

                Route::get("/cv", [CvController::class, 'index'])->name('candidate.cv.index');

                Route::post('/jobs/apply', [JobController::class, 'postuler'])->name('candidate.jobs.store');
                Route::post('/jobs/apply/{application}/cancel', [JobController::class, 'annuler'])->name('candidate.jobs.cancel');
                Route::post('/profile', [ProfileController::class, 'store'])->name('candidate.profile.store');
                Route::post('/settings', [SettingController::class, 'store'])->name('candidate.settings.store');
            });
        });
    });
