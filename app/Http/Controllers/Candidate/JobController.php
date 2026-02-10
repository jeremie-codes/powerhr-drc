<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobOffer::latest()->paginate(10);

        return view('candidate.job', compact('jobs'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Validation
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'pays_residence'  => 'required|string|max:100',
            'langue'          => 'required|string|max:5',
            'bio'             => 'nullable|string',
        ]);

        // Mise à jour du user
        $user->update([
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'bio' => $validated['bio'] ?? null,
            'langue'  => $validated['langue'],
            'country_id'  => $validated['pays_residence'],
        ]);

        return redirect()
            ->back()
            ->with('success', 'Profil mis à jour avec succès.');
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
