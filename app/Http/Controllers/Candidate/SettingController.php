<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateProfile;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Can;

class SettingController extends Controller
{

    public function index()
    {
        $user = Auth::user()->load('candidate');
        $countries = Country::all();

        return view('candidate.settings', compact('user', 'countries'));
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
            'avatar'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /* Upload de l'avatar */
        if ($request->hasFile('avatar')) {

            // Supprimer l’ancienne image
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // Stockage
            $validated['image'] = $request
                ->file('avatar')
                ->store('avatars', 'public');
        }

        // Mise à jour unique
        $user->update([
            'name'        => $validated['name'],
            'email'       => $validated['email'],
            'langue'      => $validated['langue'],
            'country_id'  => $validated['pays_residence'],
            'image'       => $validated['image'] ?? $user->image,
        ]);

        CandidateProfile::updateOrCreate(
            ['user_id' => $user->id],
            ['summary' => $validated['bio'] ?? null]
        );

        return redirect()
            ->back()
            ->with('success', 'Profil mis à jour avec succès.');
    }

}
