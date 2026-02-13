<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{

    public function index()
    {
        $candidat = Auth::user();

       // Charger le profil + toutes les relations
        $candidat->load([
            'candidate.experiences',
            'candidate.educations',
            'candidate.skills',
            'candidate.languages'
        ]);

        // dd($candidat);

        return view('candidate.cv.index', compact('candidat'));
    }

    public function download()
    {
        $candidat = Auth::user()->load([
            'candidate.experiences',
            'candidate.educations',
            'candidate.skills',
            'candidate.languages'
        ]);

        $pdf = Pdf::loadView('candidate.cv.show', compact('candidat'))
                ->setPaper('A4');

        return $pdf->download('CV_'.$candidat->name.'.pdf');
    }

}
