<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientBrief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientBriefController extends Controller
{
    public function create()
    {
        $user = Auth::user()->load('company');

        // Vérifier si profil entreprise complété
        if (!$user->company) {
            return view('client.briefs.locked');
        }

        $brief = ClientBrief::where('company_id', $user->company->id)->get()->first();

        return view('client.briefs.create', [
            'company' => $user->company,
            'brief' => $brief
        ]);
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user()->load('company');

            if (!$user->company) {
                abort(403, 'Complétez votre profil entreprise avant.');
            }

            $request->validate([

                /* ==============================
                * IDENTIFICATION
                * ============================== */
                'nom_organisation' => 'required|string|max:255',
                'secteur_activite' => 'required|string|max:255',
                'localisation' => 'required|string|max:255',
                'taille_effectif' => 'required|integer|min:1',

                'organigramme_fichier' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:5120',

                'contexte_actuel' => 'required|in:CROISSANCE,RESTRUCTURATION,INTERNATIONALISATION,PROJET_SPECIFIQUE',

                /* ==============================
                * OBJECTIFS & CULTURE
                * ============================== */
                'objectifs_strategiques' => 'required|string',
                'defis_rh' => 'required|string',
                'valeurs_entreprise' => 'required|string',

                'mode_management' => 'required|in:CENTRALISE,PARTICIPATIF,ENTREPRENEURIAL,AUTRES',

                'identite_interne' => 'required|string',
                'identite_externe' => 'required|string',

                /* ==============================
                * EFFECTIF & COMPÉTENCES
                * ============================== */
                'effectif_par_categorie' => 'required|string',
                'repartition_talents' => 'required|string',
                'postes_critiques' => 'required|string',
                'forces_internes' => 'required|string',
                'profils_difficiles' => 'required|string',

                'lacunes_actuelles' => 'required|array|min:1',
                'lacunes_actuelles.*' => 'string|max:255',

                /* ==============================
                * RECRUTEMENT
                * ============================== */
                'postes_ouverts' => 'required|string',
                'competences_critiques' => 'required|string',
                'besoins_court_moyen_terme' => 'required|string',

                /* ==============================
                * ENJEUX RH
                * ============================== */
                'enjeux_rh' => 'required|string',
                'contraintes_productivite' => 'required|string',
                'obligations_legales' => 'required|string',

                /* ==============================
                * POWER HR
                * ============================== */
                'type_accompagnement' => 'required|in:CONSEIL,RECRUTEMENT,PARTENARIAT,PONCTUEL',
                'criteres_succes' => 'required|string',

                /* ==============================
                * DECISION
                * ============================== */
                'decideurs_finaux' => 'required|string|max:255',
                'interlocuteurs_operationnels' => 'required|string|max:255',
                'delais_souhaites' => 'required|string|max:255',

                /* ==============================
                * BUDGET
                * ============================== */
                'budget_disponible' => 'nullable|string',

                'preference_facturation' => 'required|in:FORFAIT,SUCCES,ABONNEMENT',

                'benchmark_interne' => 'nullable|string',

                /* ==============================
                * PLANNING
                * ============================== */
                'delais_critiques' => 'required|string',
                'phases_projet' => 'required|string',

                /* ==============================
                * KPI
                * ============================== */
                'indicateurs_performance' => 'required|array|min:1',
                'indicateurs_performance.*' => 'string|max:255',

                /* ==============================
                * RISQUES
                * ============================== */
                'risques_percus' => 'required|array|min:1',
                'risques_percus.*' => 'string|max:255',

                'solutions_attendues' => 'required|string',

            ]);

            if ($request->hasFile('organigramme_fichier')) {
                $path = $request->file('organigramme_fichier')
                    ->store('organigrammes', 'public');

                $validated['organigramme_fichier'] = $path;
            }

            $brief = ClientBrief::create([
                'company_id' => $user->company->id,
                ...$validated
            ]);

            $user->company->update([
                'can_post' => true
            ]);

            return redirect()->route('client.index')
                ->with('success', 'Contrat enregistré. Publication activée.');
        } catch (\Exception $e) {

            \Log::error('Erreur lors de l’enregistrement du contrat (brief): ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, ClientBrief $brief)
    {
        try {

            $validated = $request->validate([
                /* ==============================
                * IDENTIFICATION
                * ============================== */
                'nom_organisation' => 'required|string|max:255',
                'secteur_activite' => 'required|string|max:255',
                'localisation' => 'required|string|max:255',
                'taille_effectif' => 'required|integer|min:1',

                'organigramme_fichier' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:5120',

                'contexte_actuel' => 'required|in:CROISSANCE,RESTRUCTURATION,INTERNATIONALISATION,PROJET_SPECIFIQUE',

                /* ==============================
                * OBJECTIFS & CULTURE
                * ============================== */
                'objectifs_strategiques' => 'required|string',
                'defis_rh' => 'required|string',
                'valeurs_entreprise' => 'required|string',

                'mode_management' => 'required|in:CENTRALISE,PARTICIPATIF,ENTREPRENEURIAL,AUTRES',

                'identite_interne' => 'required|string',
                'identite_externe' => 'required|string',

                /* ==============================
                * EFFECTIF & COMPÉTENCES
                * ============================== */
                'effectif_par_categorie' => 'required|string',
                'repartition_talents' => 'required|string',
                'postes_critiques' => 'required|string',
                'forces_internes' => 'required|string',
                'profils_difficiles' => 'required|string',

                'lacunes_actuelles' => 'required|array|min:1',
                'lacunes_actuelles.*' => 'string|max:255',

                /* ==============================
                * RECRUTEMENT
                * ============================== */
                'postes_ouverts' => 'required|string',
                'competences_critiques' => 'required|string',
                'besoins_court_moyen_terme' => 'required|string',

                /* ==============================
                * ENJEUX RH
                * ============================== */
                'enjeux_rh' => 'required|string',
                'contraintes_productivite' => 'required|string',
                'obligations_legales' => 'required|string',

                /* ==============================
                * POWER HR
                * ============================== */
                'type_accompagnement' => 'required|in:CONSEIL,RECRUTEMENT,PARTENARIAT,PONCTUEL',
                'criteres_succes' => 'required|string',

                /* ==============================
                * DECISION
                * ============================== */
                'decideurs_finaux' => 'required|string|max:255',
                'interlocuteurs_operationnels' => 'required|string|max:255',
                'delais_souhaites' => 'required|string|max:255',

                /* ==============================
                * BUDGET
                * ============================== */
                'budget_disponible' => 'nullable|string',

                'preference_facturation' => 'required|in:FORFAIT,SUCCES,ABONNEMENT',

                'benchmark_interne' => 'nullable|string',

                /* ==============================
                * PLANNING
                * ============================== */
                'delais_critiques' => 'required|string',
                'phases_projet' => 'required|string',

                /* ==============================
                * KPI
                * ============================== */
                'indicateurs_performance' => 'required|array|min:1',
                'indicateurs_performance.*' => 'string|max:255',

                /* ==============================
                * RISQUES
                * ============================== */
                'risques_percus' => 'required|array|min:1',
                'risques_percus.*' => 'string|max:255',

                'solutions_attendues' => 'required|string',
                'organigramme_fichier' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:5120',
            ]);

            /*
            |--------------------------------------------------------------------------
            | Si nouveau fichier → supprimer l'ancien
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('organigramme_fichier')) {

                // Supprimer ancien fichier
                if ($brief->organigramme_fichier &&
                    Storage::disk('public')->exists($brief->organigramme_fichier)) {

                    Storage::disk('public')->delete($brief->organigramme_fichier);
                }

                // Stocker nouveau
                $path = $request->file('organigramme_fichier')
                    ->store('organigrammes', 'public');

                $validated['organigramme_fichier'] = $path;
            }

            $brief->update($validated);

            return redirect()->route('client.index')
                ->with('success', 'Brief client init mis à jour avec succès.');

        } catch (\Exception $e) {

            \Log::error('Erreur update brief: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

}
