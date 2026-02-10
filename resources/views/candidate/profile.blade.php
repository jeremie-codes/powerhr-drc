@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Mon Profil</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                <a href="{{ route('candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                    Accueil
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Mon Profil</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                    <img src="{{ asset('assets/images/user-grid/user-grid-bg1.png') }}" alt="" class="w-100 object-fit-cover">
                    <div class="pb-24 ms-16 mb-24 me-16  mt--100">
                        <div class="text-center border border-top-0 border-start-0 border-end-0">
                            <img src="{{ asset('build/images/users/avatar-1.png') }}" alt="" class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover bg-blue-light">
                            <h6 class="mb-0 mt-16">{{ auth()->user()->name }}</h6>
                            <span class="text-secondary-light mb-16">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Information Personnelle</h6>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Nom complet</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->name ?? '--' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->email ?? '--' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Pays</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()?->country->name ?? '--' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Langue</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->langue ?? '--' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Bio</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ auth()->user()->bio ?? '--' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab" aria-controls="pills-edit-profile" aria-selected="true">
                                Modifier le Profil
                              </button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link d-flex align-items-center px-24" id="pills-change-passwork-tab" data-bs-toggle="pill" data-bs-target="#pills-change-passwork" type="button" role="tab" aria-controls="pills-change-passwork" aria-selected="false" tabindex="-1">
                                Changer le mot de passe
                              </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                <h6 class="text-md text-primary-light mb-16">Profile Image</h6>
                                <!-- Upload Image Start -->
                                <div class="mb-24 mt-16">
                                    <div class="avatar-upload">
                                            <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                                <label for="imageUpload" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
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

                                <form action="{{ route('profile.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-20">
                                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
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
                                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
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
                                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
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
                                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    Langue par défaut <span class="text-danger-600">*</span>
                                                </label>
                                                <select name="langue" class="form-control radius-8 form-select" required>
                                                    <option disabled selected value="">-- Choisir Langue --</option>
                                                    <option value="fr" @if (auth()->user()->langue == 'fr') selected @endif>Français</option>
                                                    <option value="en" @if (auth()->user()->langue == 'en') selected @endif>English</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="mb-20">
                                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    Bio (optionnel)
                                                </label>
                                                <textarea
                                                    name="bio"
                                                    class="form-control radius-8"
                                                    placeholder="Écrivez quelque chose qui vous représente."
                                                > {{ $user->bio ?? "" }} </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 px-56 py-11 radius-8">
                                            Annuler
                                        </button>
                                        <button type="submit" class="btn btn-primary px-56 py-12 radius-8">
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
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">
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
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">
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
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">
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
                                    <button type="submit" class="btn btn-primary px-56 py-12 radius-8">
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
    $("#imageUpload").change(function() {
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
