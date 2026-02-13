<?php

namespace App\Http\Controllers\Client;

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

        /* Catégories avec offres visi */
        $categories = JobCategory::whereHas('jobOffers')
            ->withCount('jobOffers as jobs_count')
            /*->withCount(['jobOffers as jobs_count' => function ($q) {
                $q->where('client_id', Auth::id());
            }])*/
            ->orderByDesc('jobs_count')
            ->get();

        /* Offres filtrées */
        // $jobs = JobOffer::where('client_id', Auth::id())->search($search)
        $jobs = JobOffer::search($search)
            ->when($status === 'active', fn ($q) => $q->where('is_active', 1))
            ->when($status === 'inactive', fn ($q) => $q->where('is_active', 0))
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

        return view('client.job.index', compact(
            'jobs',
            'categories',
            'stats',
            'search',
            'status',
        ));
    }

    public function show(JobOffer $jobOffer)
    {
        return view('client.job.show', compact('jobOffer'));
    }

    public function create()
    {
        $categories = JobCategory::all();
        return view('client.job.create', compact('categories'));
    }

    public function edit(JobOffer $jobOffer)
    {
        $categories = JobCategory::all();
        return view('client.job.edit', compact('categories', 'jobOffer'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'job_category_id' => 'required|exists:job_categories,id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'contract_type' => 'nullable|string',
                'experience_years' => 'nullable|integer|min:0',
                'salary' => 'nullable|numeric|min:0',
                'currency' => 'nullable|string|max:10',
                'expires_at' => 'nullable|date|after:today',
            ]);

            JobOffer::create([
                'client_id' => Auth::id(),
                'job_category_id' => $request->job_category_id,
                'title' => $request->title,
                'description' => $request->description,
                'location' => $request->location,
                'contract_type' => $request->contract_type,
                'experience_years' => $request->experience_years,
                'salary' => $request->salary,
                'currency' => $request->currency ?? 'USD',
                'expires_at' => $request->expires_at,
                'is_deleted' => false,
            ]);

            return redirect()->route('client.dashboard')
                ->with('success', 'Offre publiée avec succès.');
        }
        catch (\Exception $e) {
            \Log::error('Erreur lors de l’ajout de l’offre: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de l’ajout de l’offre.');
        }
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        try {
            $request->validate([
                'job_category_id' => 'required|exists:job_categories,id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'contract_type' => 'nullable|string',
                'experience_years' => 'nullable|integer|min:0',
                'salary' => 'nullable|numeric|min:0',
                'currency' => 'nullable|string|max:10',
                'expires_at' => 'nullable|date|after:today',
                'is_active' => 'nullable|boolean',
            ]);

            $jobOffer->update($request->all());

            return redirect()->route('client.jobs.index')
                ->with('success', 'Offre modifiée avec succès.');
        }
        catch (\Exception $e) {
            \Log::error('Erreur lors de la modification de l’offre: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de la modification de l’offre.');
        }
    }

    public function destroy(JobOffer $jobOffer)
    {
        try {
            $jobOffer->delete();
            return back()->with('success', 'Offre supprimée avec succès.');
        }
        catch (\Exception $e) {
            \Log::error('Erreur lors de la suppression de l’offre: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de la suppression de l’offre.');
        }
    }

    public function demandes(Request $request)
    {

        $status = $request->status;

        $applications = Application::with('jobOffer')
            ->where('client_id', Auth::id())
            ->when($status, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        // Statistiques
        $stats = [
            'acceptee' => Application::where('client_id', Auth::id())
                ->where('status', 'acceptee')->count(),

            'soumise' => Application::where('client_id', Auth::id())
                ->where('status', 'soumise')->count(),

            'rejetee' => Application::where('client_id', Auth::id())
                ->where('status', 'rejetee')->count(),
        ];

        return view('client.job.demande', compact('applications', 'stats'));
    }

    public function postuler(Request $request)
    {
        try {
            // Vérifier que l'utilisateur est candidat
            if (auth()->user()->role !== 'client') {
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
                ->where('client_id', auth()->id())
                ->exists();

            if ($alreadyApplied) {
                return back()->with('error', 'Vous avez déjà postulé à cette offre.');
            }

            // Création de la candidature
            Application::create([
                'job_offer_id' => $job->id,
                'client_id' => auth()->id(),
                'status' => 'soumise'
            ]);

            return back()->with('success', 'Candidature envoyée avec succès.');
        }
        catch (\Exception $e) {
            \Log::error('Erreur lors de la candidature: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

}
