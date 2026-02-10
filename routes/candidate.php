<?php

use App\Http\Controllers\Candidate\DemandeController;
use App\Http\Controllers\Candidate\JobController;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\RouteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::middleware(['auth', 'role:candidate'])->group(function () {
    Route::prefix('candidate')->group(function () {
        Route::get('/', [RouteController::class, 'index'])->name('candidate.index');

        Route::post("/store", [RouteController::class, 'store'])->name('candidate.store');
        Route::get("/canidatures", [RouteController::class, 'candidature'])->name('candidature');

        Route::get("/job/list", [JobController::class, 'index'])->name('demande.index');

        Route::get("/job/apply", [DemandeController::class, 'index'])->name('demande.apply');
        Route::post("/job/apply", [DemandeController::class, 'store'])->name('demande.store');

        Route::post("/offert/postule/{id}", [RouteController::class, 'postuler'])->name('offert.postule');
        Route::post("/offert/cancel/{id}", [RouteController::class, 'cancel'])->name('offert.cancel');

        Route::get('/profile', [ProfileController::class, 'index'])->name('candidate.profile');

        Route::post('/demande/{application}/annuler',
            [DemandeController::class, 'annuler']
        )->name('candidate.demande.annuler');


    /*
        Route::get("/mon-cv", [GenerateController::class, 'index'])->name('generate.index');
        Route::get("/model/{id}/selected", [GenerateController::class, 'select'])->name('model.selected');

        Route::get('/cv/view', [CvController::class, 'view'])->name('cv.generer.pdf');
        Route::get('/cv/{id}/download', [CvController::class, 'download'])->name('cv.telecharger.pdf');
        Route::get('/cv/create', [GenerateController::class, 'create'])->name('cv.create');

        Route::post("/cv/store", [CvController::class, 'store'])->name('cv.store');
        Route::post("/cv/store_file", [CvController::class, 'store_file'])->name('cv.store_file');
        Route::post("/cv/{id}/delete", [CvController::class, 'delete'])->name('cv.delete');

        Route::post('/documents/upload', [DocumentController::class, 'upload'])->name('documents.upload');
        Route::delete('/documents/delete', [DocumentController::class, 'delete'])->name('documents.delete');
    */

        Route::get('/documents/download/{id}', function ($id) {
            $document = \App\Models\CandidateDocument::findOrFail($id);

            $filePath = 'documents/' . $document->filename;

            if (Storage::disk('public')->exists($filePath)) {
                return Storage::disk('public')->download($filePath, $document->filename);
            }

            abort(404, 'Fichier introuvable');
        })->name('documents.download');


        Route::get('/documents/view/{id}', function ($id) {
            $document = \App\Models\CandidateDocument::findOrFail($id);
            $filePath = 'documents/' . $document->filename;

            if (Storage::disk('public')->exists($filePath)) {
                return Storage::disk('public')->response($filePath);
            }

            abort(404, 'Fichier introuvable');
        })->name('documents.view');


    });
});

