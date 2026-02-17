@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Trouver un profil</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('client.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Recherche</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="row gy-4">
            {{-- Filtre --}}
            <div class="col-lg-12">
                <div class="accordion" id="accordionExample">
                    <div class="mb-1 accordion-item">
                        <h2 class="accordion-header">
                            <button class="text-lg accordion-button text-primary-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="{{ count($recommendedProfiles) > 0 || count($otherProfiles) > 0 ? 'false': 'true' }}">
                                <span class="icon">
                                    <iconify-icon icon="mage:filter" class="text-xl"></iconify-icon>
                                </span>

                                <span class="px-3 fw-semibold">Filtre</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse {{ count($recommendedProfiles) > 0 || count($otherProfiles) > 0 ? '': 'show' }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form method="GET" action="{{ route('client.search') }}" class="row gy-3">
                                    <div class="col-md-4">
                                        <label class="mb-8 form-label fw-semibold">Type de contrat <span
                                                class="text-danger-600">*</span></label>
                                        <div class="icon-field has-validation">
                                            <span class="icon">
                                                <iconify-icon icon="mage:file"></iconify-icon>
                                            </span>
                                            <input type="text" name="job_type" class="form-control radius-8" value="{{ request('job_type') }}" placeholder="Ex: Développeur Web, Designer, etc.">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Genre</label>
                                        <div class="icon-field has-validation">
                                            <span class="icon">
                                                <iconify-icon icon="f7:person"></iconify-icon>
                                            </span>
                                            <select name="gender" class="px-5 form-select radius-8">
                                                <option {{ request('gender') == '' ? 'selected': '' }} value="tous" selected>Tous</option>
                                                <option {{ request('gender') == 'masculin' ? 'selected': '' }} value="masculin">Masculin</option>
                                                <option {{ request('gender') == 'feminin' ? 'selected': '' }} value="feminin">Féminin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Niveau d'étude</label>
                                        <div class="icon-field has-validation">
                                            <span class="icon">
                                                <iconify-icon icon="f7:person"></iconify-icon>
                                            </span>
                                            <select name="qualification_level" class="px-5 form-select radius-8">
                                                <option {{ request('qualification_level') == '' ? 'selected': '' }} value="tous" selected>Tous</option>
                                                <option {{ request('qualification_level') == 'Bac' ? 'selected': '' }} value="Bac">Bac (Baccalauréat, Diplôme d'état)</option>
                                                <option {{ request('qualification_level') == 'Graduat' ? 'selected': '' }} value="Graduat">Graduat</option>
                                                <option {{ request('qualification_level') == 'Licencie' ? 'selected': '' }} value="Licencie">Licencie</option>
                                                <option {{ request('qualification_level') == 'master' ? 'selected': '' }} value="master">Master</option>
                                                <option {{ request('qualification_level') == 'doctorate' ? 'selected': '' }} value="doctorate">Doctorat</option>
                                                <option {{ request('qualification_level') == 'autre' ? 'selected': '' }} value="autre">Autre
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Expérience minimum</label>
                                        <div class="icon-field has-validation">
                                            <span class="icon">
                                                <iconify-icon icon="mage:calendar"></iconify-icon>
                                            </span>
                                            <input type="number" name="years_experience" class="form-control" value="{{ request('years_experience') }}" placeholder="Ex: 2 pour 2 ans">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Salaire minimum</label>
                                        <div class="icon-field has-validation">
                                            <span class="icon">
                                                <iconify-icon icon="mage:dollar"></iconify-icon>
                                            </span>
                                            <input type="number" name="salary_min" class="form-control" value="{{ request('salary_min') }}" placeholder="$ ---" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Salaire maximum</label>
                                        <div class="icon-field has-validation">
                                            <span class="icon">
                                                <iconify-icon icon="mage:dollar"></iconify-icon>
                                            </span>
                                            <input type="number" name="salary_max" class="form-control" value="{{ request('salary_max') }}" placeholder="$ ---" >
                                        </div>
                                    </div>
                                    <div class="justify-content-end col-md-12 d-flex">
                                        <button class="btn btn-success-600" type="submit">Rechercher</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($recommendedProfiles) > 0)
            <div class="col-12">
                <p class="mt-4 mb-0 text-md">Meuilleurs profiles (Cértifiés)</p>
                <hr>
            </div>
            @endif
            @foreach ($recommendedProfiles as $profile)
                <div class="col-xxl-3 col-md-6 user-grid-card">
                    <div class="overflow-hidden bg-white border position-relative radius-16">
                        <img src="{{ asset('assets/images/user-grid/user-grid-bg12.png') }}" alt=""
                            class="w-100 object-fit-cover">

                        <div class="top-0 mt-16 dropdown position-absolute end-0 me-16">
                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                class="text-white border bg-white-gradient-light w-32-px h-32-px radius-8 border-light-white d-flex justify-content-center align-items-center">
                                <iconify-icon icon="entypo:dots-three-vertical" class="icon "></iconify-icon>
                            </button>
                            <ul class="p-12 border shadow dropdown-menu bg-base">
                                <li>
                                    <form action="{{ route('client.candidate.recommended.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="candidate_id" value="{{ $profile->id }}">
                                        <button type="submit"
                                            class="gap-10 px-16 py-8 rounded dropdown-item text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center"
                                            href="#">
                                            Récommander ce profil
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        <div class="pb-16 text-center ps-16 pe-16 mt--50">
                            <img src="{{ asset($profile->user?->gender == 'masculin' ? 'assets/images/users/user1.png' : 'assets/images/users/user2.png') }}"
                                alt="" class="border br-white border-width-2-px w-100-px h-100-px rounded-circle object-fit-cover">

                            <div class="text-center position-relative d-flex align-items-center justify-content-center">
                                <iconify-icon icon="fa-solid:award" class="mb-0 text-2xl text-primary"></iconify-icon>
                                <h6 class="mt-4 mb-0 text-lg">Profil anonyme</h6>
                            </div>
                            <span class=" text-secondary-light">{{ $profile->qualification_level }}</span>

                            <div class="gap-4 p-12 position-relative bg-danger-gradient-light radius-8 d-flex align-items-center">
                                <div class="text-center w-100">
                                    <h6 class="mb-0 text-md">
                                        {{ strlen($profile->job_type) > 30 ? substr($profile->job_type, 0, 30) . '...' : $profile->job_type ?? 'Metier' }}
                                    </h6>
                                </div>
                            </div>
                            <a href="{{ route('client.candidate.recommended.show', $profile) }}"
                                class="gap-2 p-10 px-12 py-12 mt-16 text-sm bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white btn-sm radius-8 d-flex align-items-center justify-content-center fw-medium w-100">
                                Voir le profil
                                <iconify-icon icon="solar:alt-arrow-right-linear"
                                    class="text-xl icon line-height-1"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            @if(count($otherProfiles) > 0)
            <div class="col-12">
                <p class="mt-4 mb-0 text-md">Autres profiles trouvés</p>
                <hr>
            </div>
            @endif
            @foreach ($otherProfiles as $otherProfile)
                <div class="col-xxl-3 col-md-6 user-grid-card">
                    <div class="overflow-hidden bg-white border position-relative radius-16">
                        <img src="{{ asset('assets/images/user-grid/user-grid-bg12.png') }}" alt=""
                            class="w-100 object-fit-cover">

                        <div class="top-0 mt-16 dropdown position-absolute end-0 me-16">
                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                class="text-white border bg-white-gradient-light w-32-px h-32-px radius-8 border-light-white d-flex justify-content-center align-items-center">
                                <iconify-icon icon="entypo:dots-three-vertical" class="icon "></iconify-icon>
                            </button>
                            <ul class="p-12 border shadow dropdown-menu bg-base">
                                <li>
                                    <form action="{{ route('client.candidate.recommended.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="candidate_id" value="{{ $profile->id }}">
                                        <button type="submit"
                                            class="gap-10 px-16 py-8 rounded dropdown-item text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center"
                                            href="#">
                                            Récommander ce profil
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        <div class="pb-16 text-center ps-16 pe-16 mt--50">
                            <img src="{{ asset($otherProfile->user?->gender == 'masculin' ? 'assets/images/users/user1.png' : 'assets/images/users/user2.png') }}"
                                alt="" class="border br-white border-width-2-px w-100-px h-100-px rounded-circle object-fit-cover">

                            <h6 class="mt-4 mb-0 text-lg">Profil anonyme</h6>
                            <span class=" text-secondary-light">{{ $otherProfile->qualification_level }}</span>

                            <div class="gap-4 p-12 position-relative bg-danger-gradient-light radius-8 d-flex align-items-center">
                                <div class="text-center w-100">
                                    <h6 class="mb-0 text-md">
                                        {{ strlen($otherProfile->job_type) > 30 ? substr($otherProfile->job_type, 0, 30) . '...' : $otherProfile->job_type ?? 'Metier' }}
                                    </h6>
                                </div>
                            </div>
                            <a href="{{ route('client.candidate.recommended.show', $otherProfile) }}"
                                class="gap-2 p-10 px-12 py-12 mt-16 text-sm bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white btn-sm radius-8 d-flex align-items-center justify-content-center fw-medium w-100">
                                Voir le profil
                                <iconify-icon icon="solar:alt-arrow-right-linear"
                                    class="text-xl icon line-height-1"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (count($otherProfiles) == 0 && count($recommendedProfiles) == 0)
                <div class="text-center col-12">
                    <p class="mt-4 mb-0 text-md">Aucun profile trouvé !</p>
                </div>
            @endif

            <div class="flex-wrap gap-2 mt-24 d-flex align-items-center justify-content-end">
                {{ count($otherProfiles) < 0 ? $otherProfiles?->links('vendor.pagination.custom') : null }}
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
