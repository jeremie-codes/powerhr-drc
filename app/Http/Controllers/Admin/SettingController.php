<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function index()
    {
        $user = Auth::user()->load('company');
        $countries = Country::all();

        return view('client.settings', compact('user', 'countries'));
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();

            // Validation
            $validated = $request->validate([
                'name'            => 'required|string|max:255',
                'email'           => 'required|email|max:255',
                'pays_residence'  => 'required|string|max:100',
                'langue'          => 'required|string|max:5',
                'phone'           => 'nullable|string|max:12',
                'gender'           => 'required|string|max:12',
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
                'gender'      => $validated['gender'],
                'phone'       => $validated['phone'],
                'country_id'  => $validated['pays_residence'],
                'image'       => $validated['image'] ?? $user->image,
            ]);

            return redirect()
                ->back()
                ->with('success', 'Profil mis à jour avec succès.');
        } catch (\Exception $e) {

            \Log::error('Erreur lors de la mise à jour du profil user(setting): ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de la mise à jour du profil.');
        }
    }

}
