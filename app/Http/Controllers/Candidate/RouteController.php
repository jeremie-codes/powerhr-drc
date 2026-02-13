<?php

    namespace App\Http\Controllers\Candidate;

    use App\Http\Controllers\Controller;
    use App\Models\Application;
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
            $user = Auth::user()->load('candidate');
            $documents = $user->candidate->documents ?? [];
            $countries = Country::all();

            $jobs = JobOffer::visible()->get();

            $stats = [
                'count' => $jobs->count(),
                'active'   => JobOffer::visible()->currentlyActive()->count(),
                'inactive' => JobOffer::visible()->currentlyInactive()->count(),
            ];

            $demandes = [
                'acceptee' => Application::where('candidate_id', Auth::id())
                    ->where('status', 'acceptee')->count(),

                'soumise' => Application::where('candidate_id', Auth::id())
                    ->where('status', 'soumise')->count(),

                'rejetee' => Application::where('candidate_id', Auth::id())
                    ->where('status', 'rejetee')->count(),

                'annulee' => Application::where('candidate_id', Auth::id())
                    ->where('status', 'annulee')->count(),
            ];

            // Statistiques annuelles (année en cours)
            $year = Carbon::now()->year;

            $applicationsByMonth = Application::select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('COUNT(*) as total')
                )
                ->where('candidate_id', Auth::id())
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->pluck('total', 'month')
                ->toArray();

            // On remplit les 12 mois
            $monthlyData = [];

            for ($i = 1; $i <= 12; $i++) {
                $monthlyData[] = $applicationsByMonth[$i] ?? 0;
            }

            return view('candidate.index', compact(
                'user',
                'documents',
                'countries',
                'stats',
                'jobs',
                'demandes',
                'monthlyData'
            ));
        }

    }
