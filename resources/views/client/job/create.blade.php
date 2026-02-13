@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Création d'offre</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('client.jobs.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Liste d'offres
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Création</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="p-0 overflow-hidden card h-100 radius-12">
            <div class="p-40 card-body">
                <form action="{{ route('client.jobs.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <h6 class="mt-4 text-md">Informations de l'offre</h6>

                        {{-- Titre --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Titre du poste</label>
                                <input type="text" name="title" class="form-control radius-8"
                                    value="{{ old('title') }}" placeholder="Ex: Développeur Laravel Senior" required>
                            </div>
                        </div>

                        {{-- Catégorie | Secteur d'activité --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Catégorie</label>
                                <select name="job_category_id" class="form-select radius-8" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Localisation --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Lieu</label>
                                <input type="text" name="location" class="form-control radius-8"
                                    value="{{ old('location') }}" placeholder="Ex: Kinshasa, Télétravail..." required>
                            </div>
                        </div>

                        {{-- Type de contrat --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Type de contrat</label>
                                <select name="contract_type" class="form-select radius-8">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="Temps plein">Temps plein</option>
                                    <option value="Temps partiel">Temps partiel</option>
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                    <option value="Stage">Stage</option>
                                    <option value="Apprentissage">Apprentissage</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                        </div>

                        {{-- Salaire --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Salaire proposé</label>
                                <input type="number" step="0.01" name="salary" class="form-control radius-8"
                                    value="{{ old('salary') }}">
                            </div>
                        </div>

                        {{-- Devise --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Devise</label>
                                <select name="currency" class="form-select radius-8">
                                    <option value="USD">USD ($)</option>
                                    <option value="CDF">CDF (FC)</option>
                                </select>
                            </div>
                        </div>

                        {{-- Expérience requise --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Années d'expérience requises</label>
                                <input type="number" name="experience_years" class="form-control radius-8"
                                    value="{{ old('experience_years') }}">
                            </div>
                        </div>

                        {{-- Date expiration --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Date d'expiration</label>
                                <input type="date" name="expires_at" class="form-control radius-8"
                                    value="{{ old('expires_at') }}">
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="col-12">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Description du poste</label>
                                <textarea name="description" class="form-control radius-8" rows="6" required>{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="gap-3 mt-24 d-flex justify-content-center">
                            <button type="submit" class="px-24 py-12 btn btn-primary radius-8">
                                Publier l’offre
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
