<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateProfile;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Can;

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
        $user = auth()->user();

        // Sauvegarde / update profil
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

        /*
        |--------------------------------------------------------------------------
        | EXPERIENCES
        |--------------------------------------------------------------------------
        */
        $profile->experiences()->delete();

        if ($request->has('experiences')) {
            foreach ($request->experiences as $exp) {
                if (!empty($exp['company_name'])) {
                    $profile->experiences()->create($exp);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | EDUCATIONS
        |--------------------------------------------------------------------------
        */
        $profile->educations()->delete();

        if ($request->has('educations')) {
            foreach ($request->educations as $edu) {
                if (!empty($edu['school'])) {
                    $profile->educations()->create($edu);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SKILLS
        |--------------------------------------------------------------------------
        */
        $profile->skills()->delete();

        if ($request->has('skills')) {
            foreach ($request->skills as $skill) {
                if (!empty($skill)) {
                    $profile->skills()->create([
                        'skill_name' => $skill
                    ]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | LANGUAGES
        |--------------------------------------------------------------------------
        */
        $profile->languages()->delete();

        if ($request->has('languages')) {
            foreach ($request->languages as $language) {
                if (!empty($language)) {
                    $profile->languages()->create([
                        'language_name' => $language
                    ]);
                }
            }
        }

        return back()->with('success', 'CV enregistré avec succès.');
    }

}
