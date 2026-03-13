@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Edition d'offre</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('admin.jobs.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Liste d'offres
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Edition</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="p-0 overflow-hidden card h-100 radius-12">
            <div class="p-40 card-body">
                <form action="{{ route('admin.jobs.update', $jobOffer) }}" method="POST">
                    @csrf

                    <div class="row">

                        <h6 class="mt-4 text-md">Informations de l'offre</h6>

                        {{-- Titre --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Titre du poste <span class="text-danger-600">*</span></label>
                                <input type="text" name="title" class="form-control radius-8"
                                    value="{{ $jobOffer->title }}" placeholder="Ex: Développeur Laravel Senior" required>
                            </div>
                        </div>

                        {{-- Catégorie | Secteur d'activité --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Catégorie <span class="text-danger-600">*</span></label>
                                <select name="job_category_id" class="form-select radius-8" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $jobOffer->job_category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Localisation --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Lieu <span class="text-danger-600">*</span></label>
                                <input type="text" name="location" class="form-control radius-8"
                                    value="{{ $jobOffer->location }}" placeholder="Ex: Kinshasa, Télétravail..." required>
                            </div>
                        </div>

                        {{-- Type de contrat --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Type de contrat <span class="text-danger-600">*</span></label>
                                <select name="contract_type" class="form-select radius-8">
                                    <option value="">-- Sélectionner --</option>
                                    <option {{ $jobOffer->contract_type == 'Temps plein' ? 'selected' : '' }} value="Temps plein">Temps plein</option>
                                    <option {{ $jobOffer->contract_type == 'Temps partiel' ? 'selected' : '' }} value="Temps partiel">Temps partiel</option>
                                    <option {{ $jobOffer->contract_type == 'CDI' ? 'selected' : '' }} value="CDI">CDI</option>
                                    <option {{ $jobOffer->contract_type == 'CDD' ? 'selected' : '' }} value="CDD">CDD</option>
                                    <option {{ $jobOffer->contract_type == 'Stage' ? 'selected' : '' }} value="Stage">Stage</option>
                                    <option {{ $jobOffer->contract_type == 'Apprentissage' ? 'selected' : '' }} value="Apprentissage">Apprentissage</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                        </div>

                        {{-- Salaire --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Salaire proposé <span class="text-danger-600">*</span></label>
                                <input type="number" step="0.01" name="salary" class="form-control radius-8"
                                    value="{{ $jobOffer->salary }}">
                            </div>
                        </div>

                        {{-- Devise --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Devise <span class="text-danger-600">*</span></label>
                                <select name="currency" class="form-select radius-8">
                                    <option value="USD" {{ $jobOffer->currency == 'USD' ? 'selected' : '' }}>USD ($)</option>
                                    <option value="CDF" {{ $jobOffer->currency == 'CDF' ? 'selected' : '' }}>CDF (FC)</option>
                                </select>
                            </div>
                        </div>

                        {{-- Expérience requise --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Années d'expérience requises <span class="text-danger-600">*</span></label>
                                <input type="number" name="experience_years" class="form-control radius-8"
                                    value="{{ $jobOffer->experience_years }}">
                            </div>
                        </div>

                        {{-- Date expiration --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Date d'expiration <span class="text-danger-600">*</span></label>
                            <input type="date"
                                name="expires_at"
                                class="form-control radius-8"
                                value="{{ $jobOffer->expires_at?->format('Y-m-d') }}">

                            </div>
                        </div>

                        {{-- Date expiration --}}
                        <div class="col-sm-6">
                            <div class="mb-20 form-check form-switch">
                                <label class="form-check-label fw-semibold" for="is_active">
                                    Activer l'offre
                                 <span class="text-danger-600">*</span> (Elle sera publiée)</label>
                                <select name="is_active" class="form-select radius-8">
                                    <option value="1" {{ $jobOffer->is_active ? 'selected' : '' }}>Oui</option>
                                    <option value="0" {{ $jobOffer->is_active == false ? 'selected' : '' }}>Non</option>
                                </select>
                            </div>
                        </div>

                        {{-- Company --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Entreprise</label>
                                <select name="client_id" class="form-select radius-8">
                                    <option value="" selected disabled >-- choisir companie -- </option>
                                    @forelse($companies as $company)
                                        <option value="{{ $company->user_id }}"
                                            {{ $company->user_id == $jobOffer->client_id ? 'selected' : '' }}
                                        >{{ $company->name }}</option>
                                        <option value="{{ auth()->user()->id }}"
                                            {{ $jobOffer->client->role == "admin" ? 'selected' : '' }}
                                        >PowerHR-DRC <small class="text-gray-100"> (Admin)</small> </option>
                                    @empty
                                        <option value="" disabled >Aucune entreprise trouvée</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="col-12">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Description du poste <span class="text-danger-600">*</span></label>
                                <textarea name="description" class="form-control radius-8" rows="6" required>{{ $jobOffer->description }}</textarea>
                            </div>
                        </div>

                        <div class="gap-3 mt-24 d-flex justify-content-center">
                            <button type="submit" class="px-24 py-12 btn btn-primary radius-8">
                                Modifier l’offre
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
