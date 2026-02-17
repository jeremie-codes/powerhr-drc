<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        if(!$user->company) {
            return redirect()->route('client.index')->with('error', 'Vous devez compléter votre profile de l\'entreprise.');
        }

        $profiles = User::with(['candidate', 'company'])
            ->whereHas('candidate', function ($query) use ($user, $request) {
                $query->where('employed_at', $user->company->id)
                ->when($request->name != "", fn ($q) => $q->where('name', 'like', '%' . $request->name . '%'));
            })
            ->paginate(10);

        return view('client.employes.index', compact('profiles'));
    }

    public function show(User $user)
    {

        if(!$user->company) {
            return redirect()->route('client.index')->with('error', 'Vous devez compléter votre profile de l\'entreprise.');
        }

        $profile = $user->load([
            'candidate.experiences',
            'candidate.educations',
            'candidate.skills',
            'candidate.languages'
        ]);

        return view('client.employes.show', compact('profile'));
    }

}
