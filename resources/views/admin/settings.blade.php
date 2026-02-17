@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Paramètres</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                <a href="{{ route('candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                    Tableau de bord
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Paramètres</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="overflow-hidden border user-grid-card position-relative radius-16 bg-base h-100">
                    <img src="{{ asset('assets/images/user-grid/user-grid-bg1.png') }}" alt="" class="w-100 object-fit-cover">
                    <div class="pb-24 mb-24 ms-16 me-16 mt--100">
                        <div class="text-center border border-top-0 border-start-0 border-end-0">
                            <img src="{{ asset(auth()->user()->image ? 'storage/' . auth()->user()->image : 'build/images/users/avatar-1.png') }}" alt=""
                                class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover bg-blue-light">

                            <h6 class="mt-16 mb-0">{{ auth()->user()->name }}</h6>
                            <span class="mb-16 text-secondary-light">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="mb-16 text-xl">Information Personnelle</h6>
                            <ul>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Nom complet</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->name ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->email ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Téléphone</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->phone ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Genre</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->gender ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Pays</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()?->country->name ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Langue</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->langue ?? '--' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="p-24 card-body">
                        <ul class="mb-20 nav border-gradient-tab nav-pills d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="px-24 nav-link d-flex align-items-center active" id="pills-edit-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab" aria-controls="pills-edit-profile" aria-selected="true">
                                Modifier le Profil
                              </button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="px-24 nav-link d-flex align-items-center" id="pills-change-passwork-tab" data-bs-toggle="pill" data-bs-target="#pills-change-passwork" type="button" role="tab" aria-controls="pills-change-passwork" aria-selected="false" tabindex="-1">
                                Changer le mot de passe
                              </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                <h6 class="mb-16 text-md text-primary-light">Profile Image</h6>
                                <form action="{{ route('client.settings.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

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
                                                    value="{{ auth()->user()->name ?? '' }}"
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
                                                    value="{{ auth()->user()->email ?? '' }}"
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
                                                    value="{{ auth()->user()->phone ?? '' }}"
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
                                                    <option value="masculin" @if (auth()->user()->gender == 'masculin') selected @endif>Masculin</option>
                                                    <option value="feminin" @if (auth()->user()->gender == 'feminin') selected @endif>Féminin</option>
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
                                                            @if (auth()->user()->country && auth()->user()->country->id == $country->id) selected @endif
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
                                                    <option value="fr" @if (auth()->user()->langue == 'fr') selected @endif>Français</option>
                                                    <option value="en" @if (auth()->user()->langue == 'en') selected @endif>English</option>
                                                </select>
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

                            <form method="POST" action="{{ route('password.update') }}" class="tab-pane fade" id="pills-change-passwork" role="tabpanel" aria-labelledby="pills-change-passwork-tab" tabindex="0">
                                @csrf
                                @method('put')

                                {{-- Mot de passe actuel --}}
                                <div class="mb-20">
                                    <label class="mb-8 text-sm form-label fw-semibold text-primary-light">
                                        Mot de passe actuel <span class="text-danger-600">*</span>
                                    </label>
                                    <div class="position-relative">
                                        <input type="password"
                                            name="current_password"
                                            class="form-control radius-8"
                                            placeholder="••••••••"
                                            required>
                                    </div>
                                </div>

                                {{-- Nouveau mot de passe --}}
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

                                {{-- Confirmation --}}
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

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="px-56 py-12 btn btn-primary radius-8">
                                        Modifier
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
<script>
    // ======================== Upload Image Start =====================
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#avatar").change(function() {
        readURL(this);
    });
    // ======================== Upload Image End =====================

    // ================== Password Show Hide Js Start ==========
    function initializePasswordToggle(toggleSelector) {
        $(toggleSelector).on('click', function() {
            $(this).toggleClass("ri-eye-off-line");
            var input = $($(this).attr("data-toggle"));
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
    // Call the function
    initializePasswordToggle('.toggle-password');
  // ========================= Password Show Hide Js End ===========================
</script>
@endsection
