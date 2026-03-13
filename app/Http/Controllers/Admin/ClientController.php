<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientBrief;
use App\Models\Country;
use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = User::where('role', 'client')
            ->when($request->name, fn($query, $name) => $query->where('name', 'like', '%' . $name . '%'))
            ->when($request->role, fn($query, $role) => $query->where('role', $role))
            ->orWhere('role', 'prospect')->paginate(10);

        $stats = [
            'all' => $clients->count(),
            'active' => User::active()->count(),
            'inactive' => User::Inactive()->count(),
        ];

        return view('admin.clients.index', compact('clients', 'stats'));
    }

    public function show(User $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.clients.create_edit', compact('countries'));
    }

    public function edit(User $client)
    {
        $countries = Country::all();
        return view('admin.clients.create_edit', compact('client', 'countries'));
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
                'can_post' => 'required|boolean',
                'is_active' => 'required|boolean',
                'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'user_id' => 'nullable|exists:users,id',
            ]);

            // Upload logo
            $logoPath = null;

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('companies', 'public');
            }

            $data = [
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
                'can_post' => $request->can_post,
                'is_active' => $request->is_active,
            ];

            if ($request->hasFile('logo')) {
                $data['logo'] = $request->file('logo')->store('companies', 'public');
            }

            Company::updateOrCreate(
                ['user_id' => $request->user_id],
                $data
            );

            return redirect()->route('admin.client.index')
                ->with('success', 'Profil entreprise enregistré avec succès.');
        } catch (\Exception $e) {

            \Log::error('Erreur lors de la mise à jour du profil: ' . $e->getMessage());
            return redirect()->route('admin.client.index')
                ->with('error', 'Une erreur est survenue.');
        }
    }

    public function update(Request $request, User $client) {
        try {
            $client->update([
                'is_active' => $request->is_active,
            ]);

            return redirect()->back()->with('success', 'Status mis à jour avec succès !');
        } catch (\Throwable $th) {

            \Log::error('Erreur lors de changement de status' . $th);
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }

}
