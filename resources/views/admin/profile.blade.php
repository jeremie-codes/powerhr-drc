@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Mon Entreprise</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Profil entreprise</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="p-0 overflow-hidden card h-100 radius-12">
            <div class="p-40 card-body">
                <form action="{{ route('client.profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <h6 class="mt-4 text-md">Informations de l'entreprise</h6>

                        <span class="mt-24 fw-semibold text-secondary-light">Logo de l'entreprise</span>
                        <div class="gap-4 col-12 d-md-flex">
                            {{-- Logo --}}
                            @if (isset($company) && $company->logo)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $company->logo) }}" width="100" class="rounded">
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

                        {{-- Nom --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">
                                    Nom de l'entreprise <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control radius-8"
                                    value="{{ old('name', $company->name ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Secteur --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                    Secteur d'activité <span class="text-danger-600">*</span>
                                </label>
                                <input type="text" name="sector" class="form-control radius-8"
                                    value="{{ old('sector', $company->sector ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Pays --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                    Pays <span class="text-danger-600">*</span>
                                </label>
                                <select name="country_id" class="form-control radius-8 form-select" required>
                                    <option disabled selected value="">-- Choisir Pays --</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if ($company && $company->country_id == $country->id) selected @endif>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- City --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Ville <span class="text-danger-600">*</span> </label>
                                <input type="text" name="city" class="form-control radius-8"
                                    value="{{ old('city', $company->city ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Adresse --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Adresse</label>
                                <input type="text" name="address" class="form-control radius-8"
                                    value="{{ old('address', $company->address ?? '') }}">
                            </div>
                        </div>

                        {{-- Site web --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Site web</label>
                                <input type="text" name="website" class="form-control radius-8"
                                    value="{{ old('website', $company->website ?? '') }}">
                            </div>
                        </div>

                        {{-- Téléphone --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Téléphone</label>
                                <input type="text" name="phone" class="form-control radius-8"
                                    value="{{ old('phone', $company->phone ?? '') }}">
                            </div>
                        </div>

                        {{-- Email DG --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Email Directeur Général</label>
                                <input type="email" name="email_dg" class="form-control radius-8"
                                    value="{{ old('email_dg', $company->email_dg ?? '') }}">
                            </div>
                        </div>

                        {{-- Email RH --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Email RH</label>
                                <input type="email" name="email_hr" class="form-control radius-8"
                                    value="{{ old('email_hr', $company->email_hr ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Rccm --}}
                        <div class="col-sm-4">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">N° D'identification / RCCM</label>
                                <input type="text" name="rccm" class="form-control radius-8"
                                    value="{{ old('rccm', $company->rccm ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Statut --}}
                        @if (isset($company))
                            <div class="mt-3 col-12">
                                <div class="alert alert-info">
                                    Statut autorisation publication :
                                    <strong>
                                        {{ $company->can_post ? 'Autorisé' : 'En attente validation admin' }}
                                    </strong>
                                </div>
                            </div>
                        @endif

                        <div class="gap-3 mt-24 d-flex justify-content-center">
                            <button type="submit" class="px-24 py-12 btn btn-primary radius-8">
                                Enregistrer
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
