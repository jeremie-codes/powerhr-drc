@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Paramètres</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                <a href="{{ route('client.candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                    Liste d'employés
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
                            <img src="{{ asset($profile->image ? 'storage/' . $profile->image : 'build/images/users/avatar-1.png') }}" alt=""
                                class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover bg-blue-light">

                            <h6 class="mt-16 mb-0">{{ $profile->name }}</h6>
                            <span class="mb-16 text-secondary-light">{{ $profile->email }}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="mb-16 text-xl">Information Personnelle</h6>
                            <ul>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Nom complet</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $profile->name ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $profile->email ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Pays</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $profile?->country->name ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Langue</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $profile->langue ?? '--' }}</span>
                                </li>
                            </ul>
                        </div>

                        <hr class="mb-12">

                        <div class="gap-2 d-flex align-items-center justify-content-center">
                            <form method="POST"
                                  action="{{ route('admin.candidates.update', $profile) }}"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir modifier ces accès ?')">
                                @csrf
                                <input type="hidden" name="is_active" value="{{ $profile->is_active ? '0' : '1' }}">
                                <button class="gap-1 btn btn-sm {{ $profile->is_active ? ' btn-danger' : ' btn-success' }} radius-8 d-inline-flex align-items-center">
                                    <i class="text-xl ri-user-forbid-line menu-icon"></i>
                                    {{ $profile->is_active ? 'Désactiver les accès' : 'Activer les accès' }}
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="overflow-hidden border shadow-4 radius-8 d-flex" id="curriculum">
                    {{-- COLONNE GAUCHE --}}
                    <div class="p-20 text-white bg-primary-500" style="width:30%;">
                        <div class="mt-20 mb-24 text-center overflow-hidden border rounded-circle bg-blue-light" style="width: 150px; height: 150px;">
                            <img src="{{ asset($profile->image ? 'storage/' . $profile->image : 'assets/images/users/user1.png') }}"
                                 class="border rounded-circle" width="150" height="150">
                        </div>

                        <h6 class="pb-2 mb-2 text-xl text-white text-uppercase border-bottom" >Coordonnées</h6>
                        <p class="mb-8 text-sm">
                            {{ 'Téléphone: ' . $profile->phone ?? '---' }}<br>
                            {{ 'Email: ' . $profile->email ?? '---'  }}<br>
                            {{ 'Sexe: ' . ucfirst($profile->gender ?? '---' ) }}<br>
                            {{ 'Adresse : ' . $profile->address ?? '---'  }}, {{ $profile?->country?->code ?? '' }}<br>
                        </p>

                        <h6 class="pb-2 mt-20 mb-2 text-xl text-white text-uppercase border-bottom" >Compétences</h6>
                        <ul class="mb-0 text-sm" style="list-style-type: disc; padding-left: 20px;">
                            @forelse($profile->candidate?->skills ?? [] as $skill)
                                <li>{{ $skill->skill_name }}</li>
                            @empty
                                <li>Aucune compétence définie</li>
                            @endforelse

                        </ul>

                        <h6 class="pb-2 mt-20 mb-2 text-xl text-white text-uppercase border-bottom" >Langues</h6>
                        <ul class="mb-0 text-sm" style="list-style-type: disc; padding-left: 20px;">
                            @forelse($profile->candidate?->languages ?? [] as $lang)
                                <li>
                                    {{ $lang->language_name }}
                                </li>
                            @empty
                                <li>Aucune langue définie</li>
                            @endforelse
                        </ul>
                    </div>

                    {{-- COLONNE DROITE --}}
                    <div class="p-24 bg-white" style="width:70%;">
                        <h5 class="mt-20 mb-0">{{ $profile->name }}</h5>

                        <h6 class="pb-2 mb-16 text-xl text-primary-500 border-bottom">
                            {{ $profile->candidate->job_type ?? 'Métier non défini' }}
                        </h6>

                        {{-- PROFIL --}}
                        <h6 class="mt-16 text-xl fw-semibold">Profil professionnel</h6>
                        <p class="text-sm">
                            {{ $profile->candidate->summary ?? 'Vous n\'avez pas décris de profil professionnel dans votre bio' }}
                        </p>

                        {{-- EXPERIENCES --}}
                        <h6 class="mt-24 text-xl fw-semibold">Parcours professionnel</h6>
                        @forelse($profile->candidate?->experiences ?? [] as $exp)
                            <div class="mb-16">
                                <strong>{{ $exp->position }}</strong><br>
                                <span class="text-sm text-muted">
                                    {{ $exp->company_name }} —
                                    {{ \Carbon\Carbon::parse($exp->start_date)->format('m/Y') }}
                                    -
                                    {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('m/Y') : 'Présent' }}
                                </span>
                                <p class="mt-4 mb-0 text-sm">
                                    {{ $exp->tasks }}
                                </p>
                            </div>
                        @empty
                            <p class="mb-0 text-sm text-muted">Aucune expérience professionnelle définie.</p>
                        @endforelse

                        {{-- EDUCATION --}}
                        <h6 class="mt-24 text-xl fw-semibold">Formation</h6>
                        @forelse($profile->candidate?->educations ?? [] as $edu)
                            <div class="mb-12">
                                <strong>{{ $edu->degree }}</strong><br>
                                <span class="text-sm text-muted">
                                    {{ $edu->school }} —
                                    {{ \Carbon\Carbon::parse($edu->start_date)->format('Y') }}
                                    -
                                    {{ $edu->end_date ? \Carbon\Carbon::parse($edu->end_date)->format('Y') : 'Présent' }}
                                </span>
                            </div>
                        @empty
                            <p class="mb-0 text-sm text-muted">Aucune formation définie.</p>
                        @endforelse
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
