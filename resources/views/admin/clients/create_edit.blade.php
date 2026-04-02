@extends('layouts.app')

@section('content')
    <div class="dashboard-main-body">

        {{-- Breadcrumb --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">
                {{ isset($client) ? "Modifier l'entreprise" : 'Créer une entreprise' }}
            </h6>

            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('admin.client.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline"></iconify-icon>
                        Entreprises
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">
                    {{ isset($client) ? 'Edition' : 'Création' }}
                </li>
            </ul>
        </div>

        <div class="p-0 overflow-hidden card radius-12">
            <div class="p-40 card-body">

                <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @isset($client)
                        <input type="hidden" name="user_id" class="form-control radius-8" value="{{ $client->id ?? '' }} " required>
                    @endisset

                    <div class="row">

                        <h6 class="mt-4 text-md">Informations de l'entreprise</h6>

                        {{-- Nom entreprise --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Nom de l'entreprise <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control radius-8"
                                    value="{{ old('name', $client->company->name ?? '') }} " required>
                            </div>
                        </div>

                        {{-- Téléphone --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Téléphone</label>
                                <input type="text" name="phone" class="form-control radius-8"
                                    value="{{ old('phone', $client->company->phone ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Adresse --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Adresse du siège <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control radius-8"
                                    value="{{ old('address', $client->company->address ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Ville --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Ville <span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control radius-8"
                                    value="{{ old('city', $client->company->city ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Pays --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Pays <span class="text-danger">*</span></label>

                                <select name="country_id" class="form-select radius-8" required>

                                    <option value="">-- Choisir --</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }} "
                                            {{ old('country_id', $client->company->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        {{-- Site web --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Site Web</label>

                                <input type="text" name="website" class="form-control radius-8"
                                    value="{{ old('website', $client->company->website ?? '') }}">
                            </div>
                        </div>

                        {{-- Secteur --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Secteur d'activité <span class="text-danger">*</span></label>

                                <input type="text" name="sector" class="form-control radius-8"
                                    value="{{ old('sector', $client->company->sector ?? '') }}" required>
                            </div>
                        </div>

                        {{-- RCCM --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">RCCM</label>

                                <input type="text" name="rccm" class="form-control radius-8"
                                    value="{{ old('rccm', $client->company->rccm ?? '') }}">
                            </div>
                        </div>

                        <h6 class="mt-4 text-md">Contacts</h6>

                        {{-- Email DG --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Email Directeur Général</label>

                                <input type="email" name="email_dg" class="form-control radius-8"
                                    value="{{ old('email_dg', $client->company->email_dg ?? '') }}">
                            </div>
                        </div>

                        {{-- Email RH --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Email RH</label>

                                <input type="email" name="email_hr" class="form-control radius-8"
                                    value="{{ old('email_hr', $client->company->email_hr ?? '') }}">
                            </div>
                        </div>

                        <h6 class="mt-4 text-md">Autorisation</h6>

                        {{-- publier --}}
                        <div class="col-md-6">

                            <div class="mb-20">

                                <label class="form-label fw-semibold">
                                    Peut publier des offres ?
                                </label>

                                <select name="can_post" class="form-select radius-8">

                                    <option value="1"
                                        {{ old('can_post', $client->company->can_post ?? '') == 1 ? 'selected' : '' }}>
                                        Oui
                                    </option>

                                    <option value="0"
                                        {{ old('can_post', $client->company->can_post ?? '') == 0 ? 'selected' : '' }}>
                                        Non
                                    </option>

                                </select>

                            </div>

                        </div>

                        {{-- actif --}}
                        <div class="col-md-6">

                            <div class="mb-20">

                                <label class="form-label fw-semibold">
                                    Compte actif
                                </label>

                                <select name="is_active" class="form-select radius-8">

                                    <option value="1"
                                        {{ old('is_active', $client->company->is_active ?? '') == 1 ? 'selected' : '' }}>
                                        Oui
                                    </option>

                                    <option value="0"
                                        {{ old('is_active', $client->company->is_active ?? '') == 0 ? 'selected' : '' }}>
                                        Non
                                    </option>

                                </select>

                            </div>

                        </div>

                        {{-- Logo --}}
                        <div class="col-md-12">

                            <div class="mb-20">

                                <label class="form-label fw-semibold">
                                    Logo de l'entreprise
                                </label>

                                <div class="gap-4 col-12 d-md-flex">
                                    {{-- Logo --}}
                                    @if (isset($client->company) && $client->company->logo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $client->company->logo) }}" width="100"
                                                class="rounded">
                                        </div>
                                    @endif

                                    <!-- Upload Image Start -->
                                    <div class="gap-3 upload-image-wrapper d-flex align-items-center">
                                        <div
                                            class="overflow-hidden border border-dashed uploaded-img d-none position-relative h-120-px w-120-px input-form-light radius-8 bg-neutral-50">
                                            <button type="button"
                                                class="top-0 mt-8 uploaded-img__remove position-absolute end-0 z-1 text-2xxl line-height-1 me-8 d-flex">
                                                <iconify-icon icon="radix-icons:cross-2"
                                                    class="text-xl text-danger-600"></iconify-icon>
                                            </button>
                                            <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                                                src="assets/images/user.png" alt="image">
                                        </div>

                                        <label
                                            class="gap-1 overflow-hidden border border-dashed upload-file h-120-px w-120-px input-form-light radius-8 bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center"
                                            for="upload-file">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload</span>
                                            <input id="upload-file" type="file" name="logo" hidden>
                                        </label>
                                    </div>
                                    <!-- Upload Image End -->
                                </div>

                                <hr class="mt-3">

                            </div>

                        </div>

                        <h6 class="text-md">Informations d'accès</h6>

                        {{-- Nom de l'utilisateur --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Nom complet de l'utilisateur <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control radius-8"
                                    value="{{ old('username', $client->name ?? '') }} " required>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control radius-8"
                                    value="{{ old('email', $client->email ?? '') }}" required>
                            </div>
                        </div>

                        @if(!isset($client))
                        {{-- Password --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Mot de passe <span class="text-danger">*</span> | Minimum 8 caractères</label>
                                <input type="password" name="password" class="form-control radius-8" required>
                            </div>
                        </div>
                        
                        {{-- Password Confirmation --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control radius-8" required>
                            </div>
                        </div>
                        @endif

                        {{-- Role --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Rôle <span class="text-danger">*</span></label>

                                <select name="role" class="form-select radius-8" required>
                                    <option selected value="prospect" {{ old('role', $client->role ?? '') == 'prospect' ? 'selected' : '' }}>Prospect</option>
                                    <option value="client" {{ old('role', $client->role ?? '') == 'client' ? 'selected' : '' }}>Client</option>
                                </select>
                            </div>
                        </div>

                        {{-- Pays --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Pays de résidence <span class="text-danger">*</span></label>

                                <select name="residence_id" class="form-select radius-8" required>

                                    <option value="">-- Choisir --</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }} "
                                            {{ old('residence_id', $client->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="gap-3 mt-24 d-flex justify-content-center">

                            <button type="submit" class="px-24 py-12 btn btn-primary radius-8">

                                {{ isset($client) ? 'Mettre à jour' : "Créer l'entreprise" }}

                            </button>

                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection



@section('scripts')
    <script>
        // =============================== Upload Single Image js start here ================================================
        const fileInput = document.getElementById("upload-file");
        const imagePreview = document.getElementById("uploaded-img__preview");
        const uploadedImgContainer = document.querySelector(".uploaded-img");
        const removeButton = document.querySelector(".uploaded-img__remove");

        fileInput.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                imagePreview.src = src;
                uploadedImgContainer.classList.remove('d-none');
            }
        });
        removeButton.addEventListener("click", () => {
            imagePreview.src = "";
            uploadedImgContainer.classList.add('d-none');
            fileInput.value = "";
        });
        // =============================== Upload Single Image js End here ================================================
    </script>
@endsection
