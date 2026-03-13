<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{

    public function index(Request $request)
    {
        $profiles = User::with(['candidate'])
            ->whereHas('candidate', function ($query) use ($request) {
                $query->where('employed_at', null)
                ->when($request->name != "", fn ($q) => $q->where('name', 'like', '%' . $request->name . '%'));
            })
            ->paginate(10);

        return view('admin.candidates.index', compact('profiles'));
    }

    public function show(User $user)
    {
        $profile = $user->load([
            'candidate.experiences',
            'candidate.educations',
            'candidate.skills',
            'candidate.languages'
        ]);

        return view('admin.candidates.show', compact('profile'));
    }

    public function update(Request $request, User $user) {
        try {
            $user->update([
                'is_active' => $request->is_active,
            ]);

            return redirect()->back()->with('success', 'Status mis à jour avec succès !');
        } catch (\Throwable $th) {

            \Log::error('Erreur lors de changement de status' . $th);
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }

}
