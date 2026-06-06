<?php

use App\Http\Controllers\Client\CandidateController;
use App\Http\Controllers\Client\ClientBriefController;
use App\Http\Controllers\Client\CvController;
use App\Http\Controllers\Client\EmployerController;
use App\Http\Controllers\Client\JobController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\RouteController;
use App\Http\Controllers\Client\SettingController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('client', function () {
    return redirect()->route('client.index', ['locale' => App::getLocale()]);
});

Route::prefix('{locale}')
    ->where(['locale' => 'fr|en'])
    ->middleware('locale')
    ->group(function () {
        Route::middleware(['auth', 'role:client,prospect'])->group(function () {
            Route::prefix('client')->group(function () {

                Route::get('/', [RouteController::class, 'index'])->name('client.index');

                Route::get('/jobs', [JobController::class, 'index'])->name('client.jobs.index');
                Route::get('/jobs/create', [JobController::class, 'create'])->name('client.jobs.create');

                Route::get('/jobs/{jobOffer}', [JobController::class, 'show'])->name('client.jobs.show');
                Route::get('/jobs/{jobOffer}/edit', [JobController::class, 'edit'])->name('client.jobs.edit');


                Route::get('/job/apply', [JobController::class, 'candidatures'])->name('client.jobs.apply');

                Route::get('/jobs/apply/{application}', [CvController::class, 'index'])->name('client.jobs.apply.show');

                Route::get('/find/candidates', [RouteController::class, 'search'])->name('client.search');

                Route::get('/employes', [EmployerController::class, 'index'])->name('client.candidate.index');
                Route::get('/employes/{user}/profile', [EmployerController::class, 'show'])->name('client.candidate.show');

                Route::get('/candidates/recommended', [CandidateController::class, 'index'])->name('client.candidate.recommended');
                Route::get('/candidates/recommended/{user}', [CandidateController::class, 'show'])->name('client.candidate.recommended.show');

                Route::get('/profile', [ProfileController::class, 'index'])->name('client.profile.index');

                Route::get('/settings', [SettingController::class, 'index'])->name('client.settings.index');

                Route::get('/brief', [ClientBriefController::class, 'create'])->name('client.briefs.index');
            });

            Route::post('/jobs/store', [JobController::class, 'store'])->name('client.jobs.store');
            Route::post('/jobs/{jobOffer}/update', [JobController::class, 'update'])->name('client.jobs.update');
            Route::post('/jobs/{jobOffer}/delete', [JobController::class, 'destroy'])->name('client.jobs.delete');
            Route::post('/jobs/apply/{apply}/change', [JobController::class, 'changeApply'])->name('client.jobs.change.apply');
            Route::post('/candidates/recommended', [CandidateController::class, 'store'])->name('client.candidate.recommended.store');
            Route::post('/candidates/recommended/{recommanded}/cancel', [CandidateController::class, 'destroy'])->name('client.candidate.recommended.cancel');
            Route::post('/profile', [ProfileController::class, 'store'])->name('client.profile.store');
            Route::post('/settings', [SettingController::class, 'store'])->name('client.settings.store');
            Route::post('/brief', [ClientBriefController::class, 'store'])->name('client.briefs.store');
            Route::post('/brief/{brief}/update', [ClientBriefController::class, 'update'])->name('client.briefs.update');
        });
    });
