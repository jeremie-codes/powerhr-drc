<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{

    public function index(Request $request)
    {


        $profiles = User::with(['candidate', 'company'])
            ->whereHas('candidate', function ($query) use ($request) {
                $query->where('employed_at', '!=', null)
                ->when($request->name != "", fn ($q) => $q->where('name', 'like', '%' . $request->name . '%'));
            })
            ->paginate(10);

        return view('admin.employes.index', compact('profiles'));
    }

    public function show(User $user)
    {

        $profile = $user->load([
            'candidate.experiences',
            'candidate.educations',
            'candidate.skills',
            'candidate.languages'
        ]);

        return view('admin.employes.show', compact('profile'));
    }

}
