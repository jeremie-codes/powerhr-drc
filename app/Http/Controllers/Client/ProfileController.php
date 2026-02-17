<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user()->load('company');
        $company = $user->company ?? null;
        $countries = Country::all();
        $jobCategories = JobCategory::all();

        return view('client.profile', compact('user', 'countries', 'jobCategories', 'company'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'sector' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:20',
                'rccm' => 'nullable|string|max:100',
                'website' => 'nullable|string|max:100',
                'city' => 'nullable|string|max:50',
                'country_id' => 'required|exists:countries,id',
                'email_dg' => 'nullable|email',
                'email_hr' => 'nullable|email',
                'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $user = Auth::user();

            // Upload logo
            $logoPath = null;

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('companies', 'public');
            }

            Company::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'name' => $request->name,
                    'sector' => $request->sector,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email_dg' => $request->email_dg,
                    'email_hr' => $request->email_hr,
                    'country_id' => $request->country_id,
                    'city' => $request->city,
                    'rccm' => $request->rccm,
                    'website' => $request->website,
                    'logo' => $logoPath,
                ]
            );

            return redirect()->route('client.index')
                ->with('success', 'Profil entreprise enregistré avec succès. En attente validation admin.');
        } catch (\Exception $e) {

            \Log::error('Erreur lors de la mise à jour du profil: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de la mise à jour du profil.');
        }
    }

}
