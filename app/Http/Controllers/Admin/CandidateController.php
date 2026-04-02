<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    public function create()
    {
        $countries = Country::all();
        $employers = Company::all();

        return view('admin.candidates.create_edit', compact('countries', 'employers'));
    }

    public function edit(User $user)
    {

        $profile = $user->load([
            'candidate.experiences',
            'candidate.educations',
            'candidate.skills',
            'candidate.languages'
        ]);
        $countries = Country::all();
        $employers = Company::all();

        return view('admin.candidates.create_edit', compact('profile', 'countries', 'employers'));
    }

    /*public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            // =========================
            // USER (admin)
            // =========================
            $userId = $request->user_id ?? null;

            $user = User::findOrFail($userId);

            // =========================
            // CANDIDATE PROFILE
            // =========================
            $profile = $user->candidate()->updateOrCreate(
                ['user_id' => $user->id],
                $request->only([
                    'summary',
                    'job_type',
                    'sector',
                    'qualification_level',
                    'years_experience',
                    'salary_expectation',
                    'availability',
                    'is_certified'
                ])
            );

            // =========================
            // EXPERIENCES
            // =========================
            $profile->experiences()->delete();

            if ($request->filled('experiences')) {

                $experiences = collect($request->experiences)
                    ->filter(fn($exp) => !empty($exp['company_name']))
                    ->values()
                    ->toArray();

                $profile->experiences()->createMany($experiences);
            }

            // =========================
            // EDUCATIONS
            // =========================
            $profile->educations()->delete();

            if ($request->filled('educations')) {

                $educations = collect($request->educations)
                    ->filter(fn($edu) => !empty($edu['school']))
                    ->values()
                    ->toArray();

                $profile->educations()->createMany($educations);
            }

            // =========================
            // SKILLS
            // =========================
            $profile->skills()->delete();

            if ($request->filled('skills')) {

                $skills = collect($request->skills)
                    ->filter()
                    ->map(fn($skill) => ['skill_name' => $skill])
                    ->values()
                    ->toArray();

                $profile->skills()->createMany($skills);
            }

            // =========================
            // LANGUAGES
            // =========================
            $profile->languages()->delete();

            if ($request->filled('languages')) {

                $languages = collect($request->languages)
                    ->filter()
                    ->map(fn($lang) => ['language_name' => $lang])
                    ->values()
                    ->toArray();

                $profile->languages()->createMany($languages);
            }

            DB::commit();

            return redirect()->route('admin.candidates.index')->with('success', 'Profil candidat enregistré avec succès.');

        } catch (\Exception $e) {

            DB::rollBack();

            \Log::error('Erreur profil candidat: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue.');
        }
    }*/

    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user_id,
            'password' => $request->filled('password') ? 'required|min:8|confirmed' : '',
            'role' => 'required|in:candidate,employee',
            'residence_id' => 'required|exists:countries,id',
            // validation conditionnelle
            'employed_at' => 'required_if:role,employee|nullable|exists:companies,id',
        ]);

        try {

            // =========================
            // USER (CREATE / UPDATE)
            // =========================
            $userData = [
                'name' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                'country_id' => $request->residence_id,
            ];

            // password seulement si rempli
            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user = User::updateOrCreate(
                ['id' => $request->user_id], // null = create
                $userData
            );

            // =========================
            // CANDIDATE PROFILE
            // =========================
            $profile = $user->candidate()->updateOrCreate(
                ['user_id' => $user->id],
                $request->only([
                    'summary',
                    'job_type',
                    'sector',
                    'qualification_level',
                    'years_experience',
                    'salary_expectation',
                    'availability',
                    'is_certified',
                    'employed_at'
                ])
            );

            // =========================
            // EXPERIENCES
            // =========================
            $profile->experiences()->delete();

            if ($request->filled('experiences')) {
                $profile->experiences()->createMany(
                    collect($request->experiences)
                        ->filter(fn($exp) => !empty($exp['company_name']))
                        ->values()
                        ->toArray()
                );
            }

            // =========================
            // EDUCATIONS
            // =========================
            $profile->educations()->delete();

            if ($request->filled('educations')) {
                $profile->educations()->createMany(
                    collect($request->educations)
                        ->filter(fn($edu) => !empty($edu['school']))
                        ->values()
                        ->toArray()
                );
            }

            // =========================
            // SKILLS
            // =========================
            $profile->skills()->delete();

            if ($request->filled('skills')) {
                $profile->skills()->createMany(
                    collect($request->skills)
                        ->filter()
                        ->map(fn($skill) => ['skill_name' => $skill])
                        ->values()
                        ->toArray()
                );
            }

            // =========================
            // LANGUAGES
            // =========================
            $profile->languages()->delete();

            if ($request->filled('languages')) {
                $profile->languages()->createMany(
                    collect($request->languages)
                        ->filter()
                        ->map(fn($lang) => ['language_name' => $lang])
                        ->values()
                        ->toArray()
                );
            }

            DB::commit();

            if($request->role == 'employee') {
                return redirect()->route('admin.employes.index')
                    ->with('success', 'Profil employé enregistré avec succès.');
            }

            return redirect()->route('admin.candidates.index')
                ->with('success', 'Profil candidat enregistré avec succès.');

        } catch (\Exception $e) {

            DB::rollBack();

            \Log::error('Erreur profil candidat: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue.');
        }
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
