<?php

    namespace App\Http\Controllers\Client;

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
            });

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


    }
