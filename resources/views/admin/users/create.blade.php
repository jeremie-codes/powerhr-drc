@extends('layouts.app')

@section('content')
    <div class="dashboard-main-body nft-page">
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">
                @if($user) Modification
                @else Création @endif
            </h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('admin.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">
                    @if($user) Modification
                    @else Création @endif
                </li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="col-lg-8 mx-auto">
                <div class="card h-100">
                    <div class="p-24 card-body">
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">

                            <!-- Upload Image Start -->
                            <div class="mt-16 mb-24">
                                <div class="avatar-upload">
                                    <div class="bottom-0 mt-16 cursor-pointer avatar-edit position-absolute end-0 me-24 z-1">
                                        <input type='file' id="avatar" name="avatar" accept=".png, .jpg, .jpeg" hidden>
                                        <label for="avatar" class="text-lg border w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border-primary-600 bg-hover-primary-100 rounded-circle">
                                            <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                        </label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Upload Image End -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                            Nom complet <span class="text-danger-600">*</span>
                                        </label>
                                        <input
                                            value="{{ $user->name ?? '' }}"
                                            type="text"
                                            name="name"
                                            class="form-control radius-8"
                                            placeholder="Entrez votre nom complet"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                            Email <span class="text-danger-600">*</span>
                                        </label>
                                        <input
                                            value="{{ $user->email ?? '' }}"
                                            type="email"
                                            name="email"
                                            class="form-control radius-8"
                                            placeholder="Entrez votre adresse email"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                            Téléphone
                                        </label>
                                        <input
                                            value="{{ $user->phone ?? '' }}"
                                            type="number"
                                            name="phone"
                                            class="form-control radius-8"
                                            placeholder="080 000 0000"
                                        >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                            Genre <span class="text-danger-600">*</span>
                                        </label>
                                        <select name="gender" class="form-control radius-8 form-select" required>
                                            <option disabled selected value="">-- Choisir Langue --</option>
                                            <option value="masculin" @if ($user && $user->gender == 'masculin') selected @endif>Masculin</option>
                                            <option value="feminin" @if ($user && $user->gender == 'feminin') selected @endif>Féminin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                            Pays de résidence <span class="text-danger-600">*</span>
                                        </label>
                                        <select name="pays_residence" class="form-control radius-8 form-select" required>
                                            <option disabled selected value="">-- Choisir Pays --</option>
                                            @foreach ($countries as $country)
                                                <option
                                                    value="{{ $country->id }}"
                                                    @if ($user && $user->country && $user->country->id == $country->id) selected @endif
                                                >
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                            Langue par défaut <span class="text-danger-600">*</span>
                                        </label>
                                        <select name="langue" class="form-control radius-8 form-select" required>
                                            <option disabled selected value="">-- Choisir Langue --</option>
                                            <option value="fr" @if ($user && $user->langue == 'fr') selected @endif>Français</option>
                                            <option value="en" @if ($user && $user->langue == 'en') selected @endif>English</option>
                                        </select>
                                    </div>
                                </div>

                                @if($user)
                                    <h6 class="text-sm text-danger-500">Laissez les champs de mot de passe vide si vous ne voulez pas le mettre à jour!</h6>
                                @endif

                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                            Nouveau mot de passe <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password"
                                                   name="password"
                                                   class="form-control radius-8"
                                                   placeholder="••••••••"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                            Confirmer le mot de passe <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password"
                                                   name="password_confirmation"
                                                   class="form-control radius-8"
                                                   placeholder="••••••••"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="gap-3 d-flex align-items-center justify-content-center">
                                <button type="reset" class="px-56 border border-danger-600 bg-hover-danger-200 text-danger-600 py-11 radius-8">
                                    Annuler
                                </button>
                                <button type="submit" class="px-56 py-12 btn btn-primary radius-8">
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
