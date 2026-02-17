<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientBrief extends Model
{
    protected $fillable = [
        'company_id',

        // Identification
        'nom_organisation',
        'secteur_activite',
        'localisation',
        'taille_effectif',
        'organigramme_fichier',
        'contexte_actuel',

        // Objectifs
        'objectifs_strategiques',
        'defis_rh',

        // Culture
        'valeurs_entreprise',
        'mode_management',
        'identite_interne',
        'identite_externe',

        // Effectif
        'effectif_par_categorie',
        'repartition_talents',
        'postes_critiques',

        // Compétences
        'forces_internes',
        'lacunes_actuelles',
        'profils_difficiles',

        // Recrutement
        'postes_ouverts',
        'besoins_court_moyen_terme',
        'competences_critiques',

        // RH
        'enjeux_rh',
        'contraintes_productivite',
        'obligations_legales',

        // POWER HR
        'type_accompagnement',
        'criteres_succes',

        // Décision
        'decideurs_finaux',
        'interlocuteurs_operationnels',
        'delais_souhaites',

        // Budget
        'budget_disponible',
        'preference_facturation',
        'benchmark_interne',

        // Planning
        'delais_critiques',
        'phases_projet',

        // KPI
        'indicateurs_performance',

        // Risques
        'risques_percus',
        'solutions_attendues'
    ];

    protected $casts = [
        'lacunes_actuelles' => 'array',
        'indicateurs_performance' => 'array',
        'risques_percus' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

