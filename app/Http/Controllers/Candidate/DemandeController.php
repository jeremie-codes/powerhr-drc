<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class DemandeController extends Controller
{
    public function index()
    {
        $applications = Application::with('jobOffer')
            ->where('candidate_id', Auth::id())
            ->latest()
            ->paginate(10);

        // Statistiques
        $stats = [
            'acceptee' => Application::where('candidate_id', Auth::id())
                ->where('status', 'acceptee')->count(),

            'soumise' => Application::where('candidate_id', Auth::id())
                ->where('status', 'soumise')->count(),

            'rejetee' => Application::where('candidate_id', Auth::id())
                ->where('status', 'rejetee')->count(),
        ];

        return view('candidate.demande', compact('applications', 'stats'));
    }

    public function annuler(Application $application)
    {
        if (!$application->canBeCancelled()) {
            abort(403);
        }

        $application->update([
            'status' => 'annulee'
        ]);

        return back()->with('success', 'Votre demande a été annulée avec succès.');
    }

}
