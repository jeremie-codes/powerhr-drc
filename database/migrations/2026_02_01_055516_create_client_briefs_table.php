<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_briefs', function (Blueprint $table) {
            $table->id();
            // company
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete()->nullable();

            /* ================================
            * IDENTIFICATION DE L’ORGANISATION
            * ================================ */
            $table->string('nom_organisation');
            $table->string('secteur_activite');
            $table->string('localisation');
            $table->integer('taille_effectif');
            $table->string('organigramme_fichier')->nullable();

            $table->enum('contexte_actuel', [
                'CROISSANCE',
                'RESTRUCTURATION',
                'INTERNATIONALISATION',
                'PROJET_SPECIFIQUE'
            ]);

            /* ================================
            * OBJECTIFS STRATÉGIQUES
            * ================================ */
            $table->text('objectifs_strategiques');
            $table->text('defis_rh');

            /* ================================
            * CULTURE & VALEURS
            * ================================ */
            $table->text('valeurs_entreprise');

            $table->enum('mode_management', [
                'CENTRALISE',
                'PARTICIPATIF',
                'ENTREPRENEURIAL',
                'AUTRES'
            ]);

            $table->text('identite_interne');
            $table->text('identite_externe');

            /* ================================
            * EFFECTIF & TALENTS
            * ================================ */
            $table->text('effectif_par_categorie');
            $table->text('repartition_talents');
            $table->text('postes_critiques');

            /* ================================
            * COMPÉTENCES
            * ================================ */
            $table->text('forces_internes');
            $table->json('lacunes_actuelles');
            $table->text('profils_difficiles');

            /* ================================
            * BESOINS EN RECRUTEMENT
            * ================================ */
            $table->text('postes_ouverts');
            $table->text('besoins_court_moyen_terme');
            $table->text('competences_critiques');

            /* ================================
            * ENJEUX RH
            * ================================ */
            $table->text('enjeux_rh');
            $table->text('contraintes_productivite');
            $table->text('obligations_legales');

            /* ================================
            * ATTENTES POWER HR
            * ================================ */
            $table->enum('type_accompagnement', [
                'CONSEIL',
                'RECRUTEMENT',
                'PARTENARIAT',
                'PONCTUEL'
            ]);

            $table->text('criteres_succes');

            /* ================================
            * DÉCISION & INTERLOCUTEURS
            * ================================ */
            $table->string('decideurs_finaux');
            $table->string('interlocuteurs_operationnels');
            $table->string('delais_souhaites');

            /* ================================
            * BUDGET
            * ================================ */
            $table->string('budget_disponible')->nullable();

            $table->enum('preference_facturation', [
                'FORFAIT',
                'SUCCES',
                'ABONNEMENT'
            ]);

            $table->string('benchmark_interne')->nullable();

            /* ================================
            * CALENDRIER
            * ================================ */
            $table->text('delais_critiques');
            $table->text('phases_projet'); ///

            /* ================================
            * KPI RH
            * ================================ */
            $table->json('indicateurs_performance');

            /* ================================
            * RISQUES
            * ================================ */
            $table->json('risques_percus');
            $table->text('solutions_attendues');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_briefs');
    }
};
