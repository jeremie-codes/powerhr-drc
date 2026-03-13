<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{

    public function index(Application $application)
    {
       // Charger le profil + toutes les relations
        $candidat = $application->candidate;

        $candidat->load([
            'candidate.experiences',
            'candidate.educations',
            'candidate.skills',
            'candidate.languages'
        ]);

        return view('admin.candidature.show', compact('candidat', 'application'));
    }

    public function download()
    {
        $candidat = Auth::user()->load([
            'candidate.experiences',
            'candidate.educations',
            'candidate.skills',
            'candidate.languages'
        ]);

        $pdf = Pdf::loadView('admin.cv.show', compact('candidat'))
                ->setPaper('A4');

        return $pdf->download('CV_'.$candidat->name.'.pdf');
    }

}
