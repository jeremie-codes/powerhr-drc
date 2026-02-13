<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobCategory;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $status = $request->status;

        /* Catégories avec offres visibles et actives */
        $categories = JobCategory::whereHas('jobOffers', function ($q) {
                $q->visible()->currentlyActive();
            })
            ->withCount(['jobOffers as jobs_count' => function ($q) {
                $q->visible()->currentlyActive();
            }])
            ->orderByDesc('jobs_count')
            ->get();

        /* Offres filtrées */
        $jobs = JobOffer::visible()
            ->search($search)
            ->when($status === 'active', fn ($q) => $q->currentlyActive())
            ->when($status === 'inactive', fn ($q) => $q->currentlyInactive())
            ->when($request->category, fn ($q) =>
                $q->where('Job_category_id', $request->category)
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /* Stats cohérentes */
        $stats = [
            'count'    => JobOffer::visible()->count(),
            'active'   => JobOffer::visible()->currentlyActive()->count(),
            'inactive' => JobOffer::visible()->currentlyInactive()->count(),
        ];

        return view('candidate.job.index', compact(
            'jobs',
            'categories',
            'stats',
            'search',
            'status',
        ));
    }

    public function show(JobOffer $jobOffer)
    {
        $jobOffer->load([
            'client.company',
            'applications'
        ]);

        $hasApplied = false;

        if (auth()->check() && auth()->user()->role === 'candidate') {
            $hasApplied = $jobOffer->applications()
                ->where('candidate_id', auth()->id())
                ->exists();
        }

        //dd($hasApplied);

        return view('candidate.job.show', compact('jobOffer', 'hasApplied'));
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();

            // Validation
            $validated = $request->validate([
                'name'            => 'required|string|max:255',
                'email'           => 'required|email|max:255',
                'pays_residence'  => 'required|string|max:100',
                'langue'          => 'required|string|max:5',
                'bio'             => 'nullable|string',
            ]);

            // Mise à jour du user
            $user->update([
                'name'  => $validated['name'],
                'email' => $validated['email'],
                'bio' => $validated['bio'] ?? null,
                'langue'  => $validated['langue'],
                'country_id'  => $validated['pays_residence'],
            ]);

            return redirect()
                ->back()
                ->with('success', 'Profil mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Une erreur est survenue lors de la mise à jour du profil.');
        }
    }

    public function annuler(Application $application)
    {
        if (!$application->canBeCancelled()) {
            abort(403);
        }

        $application->update([
            'status' => 'annulee'
        ]);

        return back()->with('success', 'Votre demande a été annulée avec succès.');
    }

    public function demandes(Request $request)
    {

        $status = $request->status;

        $applications = Application::with('jobOffer')
            ->where('candidate_id', Auth::id())
            ->when($status, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        // Statistiques
        $stats = [
            'acceptee' => Application::where('candidate_id', Auth::id())
                ->where('status', 'acceptee')->count(),

            'soumise' => Application::where('candidate_id', Auth::id())
                ->where('status', 'soumise')->count(),

            'rejetee' => Application::where('candidate_id', Auth::id())
                ->where('status', 'rejetee')->count(),
        ];

        return view('candidate.job.candidature', compact('applications', 'stats'));
    }

    public function postuler(Request $request)
    {
        // Vérifier que l'utilisateur est candidat
        if (auth()->user()->role !== 'candidate') {
            abort(403);
        }

        // Validation
        $request->validate([
            'job_offer_id' => 'required|exists:job_offers,id'
        ]);

        $job = JobOffer::findOrFail($request->job_offer_id);

        // Vérifier si l'offre est active
        if (!$job->is_active || $job->is_deleted) {
            return back()->with('error', 'Cette offre n’est plus disponible.');
        }

        // Empêcher double candidature
        $alreadyApplied = Application::where('job_offer_id', $job->id)
            ->where('candidate_id', auth()->id())
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'Vous avez déjà postulé à cette offre.');
        }

        // Création de la candidature
        Application::create([
            'job_offer_id' => $job->id,
            'candidate_id' => auth()->id(),
            'status' => 'soumise'
        ]);

        return back()->with('success', 'Candidature envoyée avec succès.');
    }


}
