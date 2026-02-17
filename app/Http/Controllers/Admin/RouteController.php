<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\CandidateProfile;
use App\Models\Country;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $countries = Country::all();

        // Offres du client
        $jobs = JobOffer::where('client_id', Auth::id())->get();

        $stats = [
            'all' => $jobs->count(),
            'expiree' => JobOffer::where('client_id', Auth::id())
                ->where('expires_at', '>', now())
                ->count(),
            'active' => JobOffer::where('client_id', Auth::id())
                ->currentlyActive()
                ->count(),
            'inactive' => JobOffer::where('client_id', Auth::id())
                ->currentlyInactive()
                ->count(),
        ];

        // Candidatures liées aux offres du client
        $applicationsQuery = Application::whereHas('jobOffer', function ($query) {
            $query->where('client_id', Auth::id());
        })->where('status', '!=', 'annulee');

        $demandes = [
            'acceptee' => (clone $applicationsQuery)->where('status', 'acceptee')->count(),
            'soumise'  => (clone $applicationsQuery)->where('status', 'soumise')->count(),
            'rejetee'  => (clone $applicationsQuery)->where('status', 'rejetee')->count(),
            'last'     => (clone $applicationsQuery)->latest()->take(5)->get(),
        ];

        // Statistiques annuelles
        $year = Carbon::now()->year;

        $applicationsByMonth = Application::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->whereHas('jobOffer', function ($query) {
                $query->where('client_id', Auth::id());
            })
            ->where('status', '!=', 'annulee')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $monthlyData = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $applicationsByMonth[$i] ?? 0;
        }

        return view('client.index', compact(
            'user',
            'countries',
            'stats',
            'jobs',
            'demandes',
            'monthlyData'
        ));
    }

    public function search(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Vérifier si une vraie recherche est faite
        |--------------------------------------------------------------------------
        */

        $hasFilters =
            $request->filled('job_type') ||
            $request->filled('gender') ||
            $request->filled('qualification_level') ||
            $request->filled('years_experience') ||
            $request->filled('salary_min') ||
            $request->filled('salary_max');

        // Si aucune recherche → on retourne la vue vide
        if (!$hasFilters) {
            return view('client.search', [
                'recommendedProfiles' => collect(),
                'otherProfiles' => collect(),
                'hasFilters' => false
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Query dynamique
        |--------------------------------------------------------------------------
        */

        $query = CandidateProfile::query()->whereHas('user', function ($q) {
            $q->whereHas('candidate', function ($qr) {
                $qr->where('availability', 'available')
                    ->where('employed_at', null);
            });
        });

        if ($request->filled('job_type')) {
            $query->where('job_type', 'like', '%' . $request->job_type . '%');
        }

        if ($request->filled('gender') && $request->gender != 'tous') {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('gender', $request->gender);
            });
        }

        if ($request->filled('qualification_level') && $request->qualification_level != 'tous') {
            $query->where('qualification_level', $request->qualification_level);
        }

        if ($request->filled('years_experience')) {
            $query->where('years_experience', '>=', $request->years_experience);
        }

        if ($request->filled('salary_min')) {
            $query->where('salary_expectation', '>=', $request->salary_min);
        }

        if ($request->filled('salary_max')) {
            $query->where('salary_expectation', '<=', $request->salary_max);
        }

        /*
        |--------------------------------------------------------------------------
        | Séparation
        |--------------------------------------------------------------------------
        */

        $recommendedProfiles = (clone $query)
            ->where('is_certified', true)
            ->latest()
            ->limit(4)
            ->get();

        $otherProfiles = (clone $query)
            ->where(function ($q) {
                $q->where('is_certified', false)
                ->orWhereNull('is_certified');
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('client.search', compact(
            'recommendedProfiles',
            'otherProfiles',
            'hasFilters'
        ));
    }

}
