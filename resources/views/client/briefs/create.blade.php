@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Brief initial client</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Contrat</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="row gy-4">
            <div class="col-lg-3">
                <div class="px-24 py-0 border active-text-tab nav flex-column nav-pills bg-base radius-12" id="v-pills-tab"
                    role="tablist" aria-orientation="vertical">
                    <button class="px-0 py-16 text-lg nav-link text-secondary-light fw-semibold border-bottom active"
                        id="v-pills-about-us-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about-us" type="button"
                        role="tab" aria-controls="v-pills-about-us" aria-selected="true">En savoir plus (FAQ)</button>

                    <button class="px-0 py-16 text-lg nav-link text-secondary-light fw-semibold border-bottom"
                        id="v-pills-ux-ui-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ux-ui" type="button"
                        role="tab" aria-controls="v-pills-ux-ui" aria-selected="false">Remplir le formulaire</button>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-about-us" role="tabpanel">
                        <div class="accordion" id="briefFaqAccordion">

                            <div class="mb-1 accordion-item">
                                <h2 class="accordion-header">
                                    <button class="text-lg accordion-button collapsed text-primary-light"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faqPublish">
                                        Pourquoi je ne peux pas publier d’offres immédiatement ?
                                    </button>
                                </h2>
                                <div id="faqPublish" class="accordion-collapse collapse"
                                    data-bs-parent="#briefFaqAccordion">
                                    <div class="accordion-body">
                                        Lors de la création de votre compte, votre entreprise est enregistrée
                                        en tant que <strong>Prospect</strong>.
                                        Afin de garantir la qualité et la cohérence des missions publiées sur PowerHR,
                                        la publication d’offres est activée uniquement après validation
                                        de votre brief stratégique.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1 accordion-item">
                                <h2 class="accordion-header">
                                    <button class="text-lg accordion-button collapsed text-primary-light"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faqContract">
                                        Que représente ce formulaire ?
                                    </button>
                                </h2>
                                <div id="faqContract" class="accordion-collapse collapse"
                                    data-bs-parent="#briefFaqAccordion">
                                    <div class="accordion-body">
                                        Ce formulaire constitue votre cadre de collaboration avec PowerHR.
                                        Il formalise vos besoins RH, vos objectifs stratégiques
                                        et les conditions d’accompagnement.
                                        Il marque le passage de <strong>Prospect</strong> à <strong>Client Partenaire</strong>.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1 accordion-item">
                                <h2 class="accordion-header">
                                    <button class="text-lg accordion-button collapsed text-primary-light"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faqActivation">
                                        Que se passe-t-il après validation du brief ?
                                    </button>
                                </h2>
                                <div id="faqActivation" class="accordion-collapse collapse"
                                    data-bs-parent="#briefFaqAccordion">
                                    <div class="accordion-body">
                                        Après validation de votre brief :
                                        <ul>
                                            <li>Votre statut passe automatiquement de <strong>Prospect</strong> à <strong>Client</strong>.</li>
                                            <li>Votre entreprise devient <strong>Partenaire PowerHR</strong>.</li>
                                            <li>La publication d’offres est activée.</li>
                                        </ul>
                                        Vous pouvez alors lancer vos recrutements ou missions en toute autonomie.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1 accordion-item">
                                <h2 class="accordion-header">
                                    <button class="text-lg accordion-button collapsed text-primary-light"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faqWhyMandatory">
                                        Pourquoi ce processus est-il obligatoire ?
                                    </button>
                                </h2>
                                <div id="faqWhyMandatory" class="accordion-collapse collapse"
                                    data-bs-parent="#briefFaqAccordion">
                                    <div class="accordion-body">
                                        PowerHR fonctionne sur un modèle de partenariat stratégique.
                                        Ce brief nous permet d’assurer :
                                        <ul>
                                            <li>La qualité des missions publiées</li>
                                            <li>La conformité des informations</li>
                                            <li>Un accompagnement adapté à vos enjeux</li>
                                        </ul>
                                        Cela garantit un écosystème professionnel fiable pour toutes les parties.
                                    </div>
                                </div>
                            </div>

                            

                        </div>
                    </div>


                    <div class="tab-pane fade" id="v-pills-ux-ui" role="tabpanel" aria-labelledby="v-pills-ux-ui-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-4 text-xl">Contrat stratégique POWER HR</h6>
                                <p class="text-neutral-500">
                                    Remplissez toutes les informations pour activer votre compte client.
                                </p>

                                <div class="form-wizard">
                                    @php
                                        $action = $brief
                                            ? route('client.briefs.update', $brief)
                                            : route('client.briefs.store');
                                    @endphp
                                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        {{-- ================= HEADER ================= --}}
                                        <div class="pb-8 my-32 overflow-x-auto form-wizard-header scroll-sm">
                                            <ul class="list-unstyled form-wizard-list">
                                                <li class="form-wizard-list__item active">
                                                    <div class="form-wizard-list__line">
                                                        <span class="count">1</span>
                                                    </div>
                                                    <span class="text-xs text fw-semibold">Identification de
                                                        l’organisation</span>
                                                </li>
                                                <li class="form-wizard-list__item">
                                                    <div class="form-wizard-list__line">
                                                        <span class="count">2</span>
                                                    </div>
                                                    <span class="text-xs text fw-semibold">Culture & Effectif</span>
                                                </li>
                                                <li class="form-wizard-list__item">
                                                    <div class="form-wizard-list__line">
                                                        <span class="count">3</span>
                                                    </div>
                                                    <span class="text-xs text fw-semibold">Compétences & Besoins</span>
                                                </li>
                                                <li class="form-wizard-list__item">
                                                    <div class="form-wizard-list__line">
                                                        <span class="count">4</span>
                                                    </div>
                                                    <span class="text-xs text fw-semibold">Enjeux RH& Processus</span>
                                                </li>
                                                <li class="form-wizard-list__item">
                                                    <div class="form-wizard-list__line">
                                                        <span class="count">5</span>
                                                    </div>
                                                    <span class="text-xs text fw-semibold">Budget & Validation</span>
                                                </li>
                                            </ul>
                                        </div>

                                        {{-- ================= STEP 1 ================= --}}
                                        <fieldset class="wizard-fieldset show">
                                            <h6 class="text-md text-neutral-500">Identification de l’organisation & du
                                                contexte</h6>
                                            <div class="row gy-3">

                                                <div class="col-sm-6">
                                                    <label class="form-label">Nom organisation</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="nom_organisation"
                                                            value="{{ $brief->nom_organisation ?? ($company->name ?? '') }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="form-label">Secteur activité</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="secteur_activite"
                                                            value="{{ $brief->secteur_activite ?? ($company->sector ?? '') }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="form-label">Localisation</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="localisation"
                                                            value="{{ $brief->localisation ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="form-label">Taille effectif</label>
                                                    <div class="position-relative">
                                                        <input type="number" name="taille_effectif"
                                                            value="{{ $brief->taille_effectif ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="form-label">Organigramme (fichier)</label>
                                                    <div class="position-relative">
                                                        <input type="file" name="organigramme_fichier"
                                                            value="{{ $brief->organigramme_fichier ?? '' }}"
                                                            class="form-control {{ $brief ? '' : 'wizard-required' }}">
                                                        <div class="wizard-form-error"></div>
                                                    </div>

                                                    @if ($brief->organigramme_fichier)
                                                        <div class="justify-center d-flex align-items-content-center">
                                                            <iconify-icon icon="mdi:file-outline"
                                                                class="menu-icon"></iconify-icon>
                                                            <small class="text-success-500">
                                                                Déjà enregistré, Laissez vide si vous ne voulez pas le
                                                                remplacer
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="form-label">Contexte actuel</label>
                                                    <div class="position-relative">
                                                        <select name="contexte_actuel"
                                                            class="form-select wizard-required">
                                                            <option
                                                                {{ $brief && $brief->contexte_actuel == 'CROISSANCE' ? 'slectec' : '' }}
                                                                value="CROISSANCE">Croissance</option>
                                                            <option
                                                                {{ $brief && $brief->contexte_actuel == 'RESTRUCTURATION' ? 'slectec' : '' }}
                                                                value="RESTRUCTURATION">Restructuration</option>
                                                            <option
                                                                {{ $brief && $brief->contexte_actuel == 'INTERNATIONALISATION' ? 'slectec' : '' }}
                                                                value="INTERNATIONALISATION">Internationalisation</option>
                                                            <option
                                                                {{ $brief && $brief->contexte_actuel == 'PROJET_SPECIFIQUE' ? 'slectec' : '' }}
                                                                value="PROJET_SPECIFIQUE">Projet spécifique</option>
                                                        </select>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <h6 class="mt-24 text-md text-neutral-500">Objectifs stratégiques de
                                                    l’entreprise</h6>

                                                <div class="col-sm-6">
                                                    <label>Objectifs prioritaires à 12-36 mois</label>
                                                    <div class="position-relative">
                                                        <textarea name="objectifs_strategiques" class="form-control wizard-required">{{ $brief->objectifs_strategiques ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Défis ou opportunités RH associés</label>
                                                    <div class="position-relative">
                                                        <textarea name="defis_rh" class="form-control wizard-required">{{ $brief->defis_rh ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="button"
                                                        class="form-wizard-next-btn btn btn-primary-600">Next</button>
                                                </div>

                                            </div>
                                        </fieldset>

                                        {{-- ================= STEP 2 ================= --}}
                                        <fieldset class="wizard-fieldset">
                                            <h6 class="text-md text-neutral-500">Culture organisationnelle & Valeurs</h6>
                                            <div class="row gy-3">
                                                <div class="col-12">
                                                    <label>Valeurs clés de l’entreprise</label>
                                                    <div class="position-relative">
                                                        <textarea name="valeurs_entreprise" class="form-control wizard-required">{{ $brief->valeurs_entreprise ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label>Mode de management</label>
                                                    <div class="position-relative">
                                                        <select name="mode_management"
                                                            class="form-select wizard-required">
                                                            <option
                                                                {{ $brief && $brief->mode_management == 'CENTRALISE' ? 'selected' : '' }}
                                                                value="CENTRALISE">Centralisé</option>
                                                            <option
                                                                {{ $brief && $brief->mode_management == 'CENTRALISE' ? 'selected' : '' }}
                                                                value="PARTICIPATIF">Participatif</option>
                                                            <option
                                                                {{ $brief && $brief->mode_management == 'CENTRALISE' ? 'selected' : '' }}
                                                                value="ENTREPRENEURIAL">Entrepreneurial</option>
                                                            <option
                                                                {{ $brief && $brief->mode_management == 'CENTRALISE' ? 'selected' : '' }}
                                                                value="AUTRES">Autres</option>
                                                        </select>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Identité souhaitée - perception interne</label>
                                                    <div class="position-relative">
                                                        <textarea name="identite_interne" class="form-control wizard-required">{{ $brief->identite_interne ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Identité souhaitée - perception externe</label>
                                                    <div class="position-relative">
                                                        <textarea name="identite_externe" class="form-control wizard-required">{{ $brief->identite_externe ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <h6 class="mt-24 text-md text-neutral-500">Effectif actuel & cartographie
                                                    des talents</h6>

                                                <div class="col-sm-6">
                                                    <label>Nombre total d’employés, par catégorie</label>
                                                    <div class="position-relative">
                                                        <textarea name="effectif_par_categorie" class="form-control wizard-required">{{ $brief->effectif_par_categorie ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Répartition par fonction, séniorité, âge, ancienneté</label>
                                                    <div class="position-relative">
                                                        <textarea name="repartition_talents" class="form-control wizard-required">{{ $brief->repartition_talents ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label>Postes critiques identifiés</label>
                                                    <div class="position-relative">
                                                        <textarea name="postes_critiques" class="form-control wizard-required">{{ $brief->postes_critiques ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="gap-2 d-flex justify-content-end">
                                                    <button type="button"
                                                        class="form-wizard-previous-btn btn btn-neutral-500">Back</button>
                                                    <button type="button"
                                                        class="form-wizard-next-btn btn btn-primary-600">Next</button>
                                                </div>
                                            </div>
                                        </fieldset>

                                        {{-- ================= STEP 3 ================= --}}
                                        <fieldset class="wizard-fieldset">
                                            <h6 class="text-md text-neutral-500">Compétences disponibles vs compétences
                                                nécessaires</h6>
                                            <div class="row gy-3">

                                                <div class="col-sm-6">
                                                    <label>Forces internes (compétences existantes)</label>
                                                    <div class="position-relative">
                                                        <textarea name="forces_internes" class="form-control wizard-required">{{ $brief->forces_internes ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Profils difficiles à recruter/fidéliser</label>
                                                    <div class="position-relative">
                                                        <textarea name="profils_difficiles" class="form-control wizard-required">{{ $brief->profils_difficiles ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label>Lacunes actuelles</label>
                                                    <div class="position-relative">
                                                        <select name="lacunes_actuelles[]" multiple id="lacunes_actuelles"
                                                            class="form-select wizard-required">
                                                            <option value="hard skills"
                                                                {{ $brief && in_array('hard skills', (array) $brief->lacunes_actuelles) ? 'selected' : '' }}>
                                                                Hard skills
                                                            </option>

                                                            <option value="soft skills"
                                                                {{ $brief && in_array('soft skills', (array) $brief->lacunes_actuelles) ? 'selected' : '' }}>
                                                                Soft skills
                                                            </option>

                                                            <option value="langues"
                                                                {{ $brief && in_array('langues', (array) $brief->lacunes_actuelles) ? 'selected' : '' }}>
                                                                Langues
                                                            </option>

                                                            <option value="digital"
                                                                {{ $brief && in_array('digital', (array) $brief->lacunes_actuelles) ? 'selected' : '' }}>
                                                                Digital
                                                            </option>

                                                            <option value="leadership"
                                                                {{ $brief && in_array('leadership', (array) $brief->lacunes_actuelles) ? 'selected' : '' }}>
                                                                Leadership
                                                            </option>
                                                        </select>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <h6 class="mt-24 text-md text-neutral-500">Besoins immédiats en recrutement
                                                    et en talents</h6>

                                                <div class="col-sm-6">
                                                    <label>Postes ouverts actuellement</label>
                                                    <div class="position-relative">
                                                        <textarea name="postes_ouverts" class="form-control wizard-required">{{ $brief->postes_ouverts ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Compétences critiques à anticiper</label>
                                                    <div class="position-relative">
                                                        <textarea name="competences_critiques" class="form-control wizard-required">{{ $brief->competences_critiques ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label>Compétences/fonctions nécessaires à court-moyen terme</label>
                                                    <div class="position-relative">
                                                        <textarea name="besoins_court_moyen_terme" class="form-control wizard-required">{{ $brief->besoins_court_moyen_terme ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="gap-2 d-flex justify-content-end">
                                                    <button type="button"
                                                        class="form-wizard-previous-btn btn btn-neutral-500">Back</button>
                                                    <button type="button"
                                                        class="form-wizard-next-btn btn btn-primary-600">Next</button>
                                                </div>

                                            </div>
                                        </fieldset>

                                        {{-- ================= STEP 4 ================= --}}
                                        <fieldset class="wizard-fieldset">
                                            <h6 class="text-md text-neutral-500">Enjeux opérationnels RH</h6>
                                            <div class="row gy-3">

                                                <div class="col-sm-6">
                                                    <label>Défis actuels (recrutement, intégration, fidélisation)</label>
                                                    <div class="position-relative">
                                                        <textarea name="enjeux_rh" class="form-control wizard-required">{{ $brief->enjeux_rh ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Contraintes de productivité, turnover, performance</label>
                                                    <div class="position-relative">
                                                        <textarea name="contraintes_productivite" class="form-control wizard-required">{{ $brief->contraintes_productivite ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label>Obligations légales ou syndicales spécifiques</label>
                                                    <div class="position-relative">
                                                        <textarea name="obligations_legales" class="form-control wizard-required">{{ $brief->obligations_legales ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <h6 class="mt-24 text-md text-neutral-500">Attentes vis-à-vis de POWER HR
                                                </h6>

                                                <div class="col-sm-6">
                                                    <label>Type accompagnement</label>
                                                    <div class="position-relative">
                                                        <select name="type_accompagnement"
                                                            class="form-select wizard-required">
                                                            <option
                                                                {{ $brief && $brief->type_accompagnement == 'CONSEIL' ? 'selected' : '' }}
                                                                value="CONSEIL">Conseil</option>
                                                            <option
                                                                {{ $brief && $brief->type_accompagnement == 'RECRUTEMENT' ? 'selected' : '' }}
                                                                value="RECRUTEMENT">Recrutement</option>
                                                            <option
                                                                {{ $brief && $brief->type_accompagnement == 'PARTENARIAT' ? 'selected' : '' }}
                                                                value="PARTENARIAT">Partenariat</option>
                                                            <option
                                                                {{ $brief && $brief->type_accompagnement == 'PONCTUEL' ? 'selected' : '' }}
                                                                value="PONCTUEL">Ponctuel</option>
                                                        </select>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Critères de succès attendus</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="criteres_succes"
                                                            value="{{ $brief->criteres_succes ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <h6 class="mt-24 text-md text-neutral-500">Processus de décision &
                                                    interlocuteurs clés</h6>

                                                <div class="col-sm-6">
                                                    <label>Décideurs finaux</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="decideurs_finaux"
                                                            value="{{ $brief->decideurs_finaux ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Interlocuteurs opérationnels</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="interlocuteurs_operationnels"
                                                            value="{{ $brief->interlocuteurs_operationnels ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label>Délais souhaités</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="delais_souhaites"
                                                            value="{{ $brief->delais_souhaites ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="gap-2 d-flex justify-content-end">
                                                    <button type="button"
                                                        class="form-wizard-previous-btn btn btn-neutral-500">Back</button>
                                                    <button type="button"
                                                        class="form-wizard-next-btn btn btn-primary-600">Next</button>
                                                </div>
                                            </div>
                                        </fieldset>

                                        {{-- ================= STEP 5 ================= --}}
                                        <fieldset class="wizard-fieldset">
                                            <h6 class="text-md text-neutral-500">Contraintes budgétaires & financières</h6>
                                            <div class="row gy-3">

                                                <div class="col-sm-6">
                                                    <label>Budget disponible</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="budget_disponible"
                                                            value="{{ $brief->budget_disponible ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Préférence facturation</label>
                                                    <div class="position-relative">
                                                        <select name="preference_facturation"
                                                            class="form-select wizard-required">
                                                            <option
                                                                {{ $brief && $brief->preference_facturation == 'FORFAIT' ? 'selected' : '' }}
                                                                value="FORFAIT">Forfait</option>
                                                            <option
                                                                {{ $brief && $brief->preference_facturation == 'SUCCES' ? 'selected' : '' }}
                                                                value="SUCCES">Succès</option>
                                                            <option
                                                                {{ $brief && $brief->preference_facturation == 'ABONNEMENT' ? 'selected' : '' }}
                                                                value="ABONNEMENT">Abonnement</option>
                                                        </select>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label>Existence d’un benchmark interne</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="benchmark_interne"
                                                            value="{{ $brief->benchmark_interne ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <h6 class="mt-24 text-md text-neutral-500">Calendrier & urgences</h6>

                                                <div class="col-sm-6">
                                                    <label>Délais critiques</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="delais_critiques"
                                                            value="{{ $brief->delais_critiques ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Projets ou phases spécifiques</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="phases_projet"
                                                            value="{{ $brief->phases_projet ?? '' }}"
                                                            class="form-control wizard-required">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <h6 class="mt-24 text-md text-neutral-500">Indicateurs de performance
                                                    attendus (KPI RH)</h6>

                                                <div class="col-12">
                                                    <label>Indicateurs clés à suivre</label>
                                                    <div class="position-relative">
                                                        <select name="indicateurs_performance[]"
                                                            id="indicateurs_performance" multiple
                                                            class="form-select wizard-required">
                                                            <option
                                                                {{ $brief && in_array('temps de recrutement', (array) $brief->indicateurs_performance) ? 'selected' : '' }}
                                                                value="temps de recrutement">Temps de recrutement</option>
                                                            <option
                                                                {{ $brief && in_array('rétention', (array) $brief->indicateurs_performance) ? 'selected' : '' }}
                                                                value="rétention">Rétention</option>
                                                            <option
                                                                {{ $brief && in_array('engagement', (array) $brief->indicateurs_performance) ? 'selected' : '' }}
                                                                value="engagement">Engagement</option>
                                                            <option
                                                                {{ $brief && in_array('ROI formation', (array) $brief->indicateurs_performance) ? 'selected' : '' }}
                                                                value="ROI formation">ROI formation</option>
                                                            <option
                                                                {{ $brief && in_array('coût par embauche', (array) $brief->indicateurs_performance) ? 'selected' : '' }}
                                                                value="coût par embauche">Coût par embauche</option>
                                                        </select>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <h6 class="mt-24 text-md text-neutral-500">Risques identifiés par le client
                                                </h6>

                                                <div class="col-12">
                                                    <label>Risques perçus</label>
                                                    <div class="position-relative">
                                                        <select name="risques_percus[]" id="risques_percus" multiple
                                                            class="form-select wizard-required">
                                                            <option
                                                                {{ $brief && in_array('pénurie', (array) $brief->risques_percus) ? 'selected' : '' }}
                                                                value="pénurie">Pénurie</option>
                                                            <option
                                                                {{ $brief && in_array('turnover', (array) $brief->risques_percus) ? 'selected' : '' }}
                                                                value="turnover">Turnover</option>
                                                            <option
                                                                {{ $brief && in_array('risques juridiques', (array) $brief->risques_percus) ? 'selected' : '' }}
                                                                value="risques juridiques">Risques juridiques</option>
                                                            <option
                                                                {{ $brief && in_array('image employeur', (array) $brief->risques_percus) ? 'selected' : '' }}
                                                                value="image employeur">Image employeur</option>
                                                        </select>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label>Solutions attendues</label>
                                                    <div class="position-relative">
                                                        <textarea name="solutions_attendues" class="form-control wizard-required">{{ $brief->nom_organisation ?? '' }}</textarea>
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>

                                                <div class="gap-2 d-flex justify-content-end">
                                                    <button type="button"
                                                        class="form-wizard-previous-btn btn btn-neutral-500">Back</button>
                                                    <button type="submit"
                                                        class="form-wizard-submit btn btn-primary-600">Enregistrer</button>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        // var tagSelector = new MultiSelectTag('countries', {
        //     // maxSelection: 5,              // default unlimited.
        //     required: true,               // default false.
        //     placeholder: 'Search tags',   // default 'Search'.
        //     onChange: function(selected) { // Callback when selection changes.
        //         console.log('Selection changed:', selected);
        //     }
        // });

        new MultiSelectTag('risques_percus', {
            required: true,
            placeholder: '-- Choisir risques -- (Plusieurs réponses possibles)',
            onChange: function(selected) {
                console.log('Selection changed:', selected);
            }
        });

        new MultiSelectTag('indicateurs_performance', {
            required: true,
            placeholder: '-- Choisir indicateurs -- (Plusieurs réponses possibles)',
            onChange: function(selected) {
                console.log('Selection changed:', selected);
            }
        });

        new MultiSelectTag('lacunes_actuelles', {
            required: true,
            placeholder: '-- Choisir lacunes -- (Plusieurs réponses possibles)',
            onChange: function(selected) {
                console.log('Selection changed:', selected);
            }
        });
    </script>

    <script>
        // =============================== Wizard Step Js Start ================================
        $(document).ready(function() {
            // click on next button
            $('.form-wizard-next-btn').on("click", function() {
                var parentFieldset = $(this).parents('.wizard-fieldset');
                var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-list .active');
                var next = $(this);
                var nextWizardStep = true;
                parentFieldset.find('.wizard-required').each(function() {
                    var thisValue = $(this).val();

                    if (thisValue == "") {
                        $(this).siblings(".wizard-form-error").show();
                        nextWizardStep = false;
                    } else {
                        $(this).siblings(".wizard-form-error").hide();
                    }
                });
                if (nextWizardStep) {
                    next.parents('.wizard-fieldset').removeClass("show", "400");
                    currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',
                        "400");
                    next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                    $(document).find('.wizard-fieldset').each(function() {
                        if ($(this).hasClass('show')) {
                            var formAtrr = $(this).attr('data-tab-content');
                            $(document).find('.form-wizard-list .form-wizard-step-item').each(
                                function() {
                                    if ($(this).attr('data-attr') == formAtrr) {
                                        $(this).addClass('active');
                                        var innerWidth = $(this).innerWidth();
                                        var position = $(this).position();
                                        $(document).find('.form-wizard-step-move').css({
                                            "left": position.left,
                                            "width": innerWidth
                                        });
                                    } else {
                                        $(this).removeClass('active');
                                    }
                                });
                        }
                    });
                }
            });
            //click on previous button
            $('.form-wizard-previous-btn').on("click", function() {
                var counter = parseInt($(".wizard-counter").text());;
                var prev = $(this);
                var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-list .active');
                prev.parents('.wizard-fieldset').removeClass("show", "400");
                prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
                currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',
                    "400");
                $(document).find('.wizard-fieldset').each(function() {
                    if ($(this).hasClass('show')) {
                        var formAtrr = $(this).attr('data-tab-content');
                        $(document).find('.form-wizard-list .form-wizard-step-item').each(
                            function() {
                                if ($(this).attr('data-attr') == formAtrr) {
                                    $(this).addClass('active');
                                    var innerWidth = $(this).innerWidth();
                                    var position = $(this).position();
                                    $(document).find('.form-wizard-step-move').css({
                                        "left": position.left,
                                        "width": innerWidth
                                    });
                                } else {
                                    $(this).removeClass('active');
                                }
                            });
                    }
                });
            });

            //click on form submit button
            $(document).on("click", ".form-wizard .form-wizard-submit", function() {
                var parentFieldset = $(this).parents('.wizard-fieldset');
                var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-list .active');
                parentFieldset.find('.wizard-required').each(function() {
                    var thisValue = $(this).val();
                    if (thisValue == "") {
                        $(this).siblings(".wizard-form-error").show();
                    } else {
                        $(this).siblings(".wizard-form-error").hide();
                    }
                });
            });

            // focus on input field check empty or not
            $(".form-control").on('focus', function() {
                var tmpThis = $(this).val();
                if (tmpThis == '') {
                    $(this).parent().addClass("focus-input");
                } else if (tmpThis != '') {
                    $(this).parent().addClass("focus-input");
                }
            }).on('blur', function() {
                var tmpThis = $(this).val();
                if (tmpThis == '') {
                    $(this).parent().removeClass("focus-input");
                    $(this).siblings(".wizard-form-error").show();
                } else if (tmpThis != '') {
                    $(this).parent().addClass("focus-input");
                    $(this).siblings(".wizard-form-error").hide();
                }
            });
        });
        // =============================== Wizard Step Js End ================================
    </script>
@endsection
