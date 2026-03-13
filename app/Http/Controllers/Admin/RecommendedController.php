<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecommandedByClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendedController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $job_type = $request->job_type;

        $profiles = RecommandedByClient::with(['candidate', 'company'])
            ->when($job_type != "", fn ($q) => $q->whereHas('candidate', function ($qr) use ($job_type) {
                $qr->where('job_type', 'like', '%' . $job_type . '%');
            }))
            ->paginate(10);

        return view('admin.recommended.index', compact('profiles'));
    }

    public function show(User $user)
    {
        $profile = User::find($user->id)->with('candidate')->get()->first();

        $recommanded = RecommandedByClient::where('candidate_profile_id', $profile->candidate?->id)
            ->paginate(10);

        return view('admin.recommended.show', compact('profile', 'recommanded'));
    }

     public function store(Request $request)
    {
        try {

            $candidateId = $request->candidate_id;
            $companyId = auth()->user()->company?->id;

            if(!$companyId)
            {
                return redirect()->back()->with('error', 'Vous devez compléter votre profile de l\'entreprise avant de recommander un candidat.');
            }

            $aleradyRecommanded = RecommandedByClient::where('company_id', $companyId)
                ->where('candidate_profile_id', $candidateId)
                ->exists();

            if ($aleradyRecommanded) {
                return redirect()->back()->with('info', 'Le candidat a deja été recommandé par cette entreprise.');
            }

            RecommandedByClient::create([
                'company_id' => $companyId,
                'candidate_profile_id' => $candidateId
            ]);

            return redirect()->back()->with('success', 'Le candidat a bien été recommandé.');
        } catch (\Exception $e) {
            \Log::error('Une erreur s\'est produite lors de la recommandation du candidat: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la recommandation du candidat.');
        }
    }

    public function destroy(RecommandedByClient $recommanded)
    {
        try {
            $recommanded->delete();
            return redirect()->back()->with('success', 'La recommandation a bien été annulée.');
        } catch (\Exception $e) {
            \Log::error('Une erreur s\'est produite lors de la suppression de la recommandation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression de la recommandation.');
        }
    }

    public function validate(Request $request, RecommandedByClient $recommanded)
    {
        try {
            $recommanded->traited = true;
            $recommanded->response = $request->response;
            $recommanded->save();

            return redirect()->route('admin.candidate.recommended')->with('success', 'La recommandation traitée avec succès.');
        } catch (\Exception $e) {
            \Log::error('Une erreur s\'est produite lors du traitement de la recommandation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }

}
