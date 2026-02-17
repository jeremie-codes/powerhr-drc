<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobCategory;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $status = $request->status;

        /* Catégories avec offres visi */
        $categories = JobCategory::whereHas('jobOffers', function ($q) {
                $q->where('client_id', Auth::id());
            })
            //->withCount('jobOffers as jobs_count')
            ->withCount(['jobOffers as jobs_count' => function ($q) {
                $q->where('client_id', Auth::id());
            }])
            ->orderByDesc('jobs_count')
            ->get();

        /* Offres filtrées */
        //$jobs = JobOffer::search($search)

        $jobs = JobOffer::where('client_id', Auth::id())->search($search)
            ->when($status === 'active', fn ($q) => $q->where('is_active', 1))
            ->when($status === 'inactive', fn ($q) => $q->where('is_active', 0))
            ->when($request->category, fn ($q) =>
                $q->where('Job_category_id', $request->category)
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /* Stats cohérentes */
        /*$stats = [
            'count'    => JobOffer::visible()->count(),
            'active'   => JobOffer::visible()->currentlyActive()->count(),
            'inactive' => JobOffer::visible()->currentlyInactive()->count(),
        ];*/

        $stats = [
            'count'    => JobOffer::where('client_id', Auth::id())->count(),
            'active'   => JobOffer::where('client_id', Auth::id())->currentlyActive()->count(),
            'inactive' => JobOffer::where('client_id', Auth::id())->currentlyInactive()->count(),
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
        $company = auth()->user()->company ?? null;

        if(!$company) {
            return redirect()->back()->with('error', 'Vous devez compléter votre profile de l\'entreprise pour publier une offre.');
        }

        if(!$company?->can_post) {
            return redirect()->back()->with('error', 'Vous n\'avez pas le droit de publier une offre. Veuillez contacter votre administrateur.');
        }

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
            $validated = $request->validate([
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

            $jobOffer->update($validated);

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

    public function candidatures(Request $request)
    {
        $status = $request->status;
        $job_id = $request->job_id;

        $jobs = JobOffer::where('client_id', Auth::id())->get();
        $applications = Application::with('candidate')->whereHas('jobOffer', function ($q) {
                $q->where('client_id', Auth::id());
            })
            ->when($status, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->when($job_id, function ($q) use ($job_id) {
                $q->where('job_offer_id', $job_id);
            })
            ->where('status', '!=', 'annulee')
            ->latest()
            ->paginate(12);

        $stats = [
            'acceptee' => Application::whereHas('jobOffer', function ($q) {
                    $q->where('client_id', Auth::id());
                })->where('status', 'acceptee')->count(),

            'soumise' => Application::whereHas('jobOffer', function ($q) {
                    $q->where('client_id', Auth::id());
                })->where('status', 'soumise')->count(),

            'rejetee' => Application::whereHas('jobOffer', function ($q) {
                    $q->where('client_id', Auth::id());
                })->where('status', 'rejetee')->count(),
        ];

        return view('client.candidature.index', compact('applications', 'stats', 'jobs'));
    }

    /**
     * @param Application $apply
     * @return \Illuminate\Http\RedirectResponse
     * mise à jour du status de la candidature par le client
    */
    public function changeApply(Request $request, Application $apply)
    {
        try {
            // Vérifier que l'utilisateur est candidat
            if (!auth()->user()->isClient()) {
                abort(403);
            }

            $request->validate([
                'status' => 'required|in:acceptee,rejetee'
            ]);

            $apply->status = $request->status;
            $apply->save();

            return back()->with('success', 'Candidature modifiée avec succès.');

        }
        catch (\Exception $e) {
            \Log::error('Erreur lors de mis à jour de la candidature: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

}
