<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user()->load('candidate');
        $countries = Country::all();

        return view('candidate.profile', compact('user', 'countries'));
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
}
