<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\RecommendedController;
use App\Http\Controllers\Admin\ClientBriefController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CvController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', [RouteController::class, 'index'])->name('admin.index');

        Route::get('/jobs', [JobController::class, 'index'])->name('admin.jobs.index');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('admin.jobs.create');
        Route::post('/jobs/store', [JobController::class, 'store'])->name('admin.jobs.store');

        Route::get('/jobs/{jobOffer}', [JobController::class, 'show'])->name('admin.jobs.show');
        Route::get('/jobs/{jobOffer}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
        Route::post('/jobs/{jobOffer}/update', [JobController::class, 'update'])->name('admin.jobs.update');
        Route::post('/jobs/{jobOffer}/delete', [JobController::class, 'destroy'])->name('admin.jobs.delete');

        Route::get('/job/apply', [JobController::class, 'candidatures'])->name('admin.jobs.apply');
        Route::post('/jobs/apply/{apply}/change', [JobController::class, 'changeApply'])->name('admin.jobs.change.apply');

        Route::get('/jobs/apply/{application}', [CvController::class, 'index'])->name('admin.jobs.apply.show');

        Route::get('/find/candidates', [RouteController::class, 'search'])->name('admin.search');

        Route::get('/clients', [ClientController::class, 'index'])->name('admin.client.index');
        Route::get('/clients/{client}/profile', [ClientController::class, 'show'])->name('admin.client.show');
        Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('admin.client.edit');
        Route::post('/clients/store', [ClientController::class, 'store'])->name('admin.client.store');
        Route::post('/clients/{client}/update', [ClientController::class, 'update'])->name('admin.client.update');

        Route::get('/candidates', [CandidateController::class, 'index'])->name('admin.candidates.index');
        Route::get('/candidates/{user}/profile', [CandidateController::class, 'show'])->name('admin.candidates.show');
        Route::post('/candidates/{user}/update', [CandidateController::class, 'update'])->name('admin.candidates.update');

        Route::get('/employes', [EmployerController::class, 'index'])->name('admin.candidate.index');
        Route::get('/employes/{user}/profile', [EmployerController::class, 'show'])->name('admin.candidate.show');

        Route::get('/candidates/recommended', [RecommendedController::class, 'index'])->name('admin.candidate.recommended');
        Route::post('/candidates/recommended', [RecommendedController::class, 'store'])->name('admin.candidate.recommended.store');
        Route::get('/candidates/recommended/{user}', [RecommendedController::class, 'show'])->name('admin.candidate.recommended.show');
        Route::post('/candidates/recommended/{recommanded}/cancel', [RecommendedController::class, 'destroy'])->name('admin.candidate.recommended.cancel');
        Route::post('/candidates/recommended/{recommanded}/validate', [RecommendedController::class, 'validate'])->name('admin.candidate.recommended.validate');

        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::post('/profile', [ProfileController::class, 'store'])->name('admin.profile.store');

        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::get('/users/{user}/edit', [UserController::class, 'create'])->name('admin.users.edit');
        Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::post('/users/{user}/disable', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/users/{user}/delete', [UserController::class, 'destroy'])->name('admin.users.delete');

    });
});

