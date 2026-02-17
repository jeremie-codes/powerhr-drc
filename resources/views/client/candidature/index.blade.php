@extends('layouts.app')

@section('content')
    <div class="dashboard-main-body nft-page">
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Candidatures</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('client.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Candidatures</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="col-12">
                <div class="row gy-4">
                    <!-- Dashboard Widget Start -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="px-24 py-16 border shadow-none card radius-12 h-100 bg-gradient-start-3">
                            <div class="p-0 card-body">
                                <div class="flex-wrap gap-1 d-flex align-items-center justify-content-between">
                                    <div class="flex-wrap gap-16 d-flex align-items-center">
                                        <span
                                            class="flex-shrink-0 mb-0 text-white w-40-px h-40-px bg-primary-600 d-flex justify-content-center align-items-center rounded-circle h6">
                                            <iconify-icon icon="flowbite:users-group-solid" class="icon"></iconify-icon>
                                        </span>

                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 fw-semibold">{{ $stats['acceptee'] }}</h6>
                                            <span class="fw-medium text-secondary-light text-md">Demandes acceptées</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Widget End -->

                    <!-- Dashboard Widget Start -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="px-24 py-16 border shadow-none card radius-12 h-100 bg-gradient-start-5">
                            <div class="p-0 card-body">
                                <div class="flex-wrap gap-1 d-flex align-items-center justify-content-between">
                                    <div class="flex-wrap gap-16 d-flex align-items-center">
                                        <span
                                            class="flex-shrink-0 mb-0 text-white w-40-px h-40-px bg-primary-600 d-flex justify-content-center align-items-center rounded-circle h6">
                                            <iconify-icon icon="flowbite:users-group-solid" class="icon"></iconify-icon>
                                        </span>

                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 fw-semibold">{{ $stats['rejetee'] }}</h6>
                                            <span class="fw-medium text-secondary-light text-md">Demandes rejetées</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Widget End -->

                    <!-- Dashboard Widget Start -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="px-24 py-16 border shadow-none card radius-12 h-100 bg-gradient-start-2">
                            <div class="p-0 card-body">
                                <div class="flex-wrap gap-1 d-flex align-items-center justify-content-between">
                                    <div class="flex-wrap gap-16 d-flex align-items-center">
                                        <span
                                            class="flex-shrink-0 mb-0 text-white w-40-px h-40-px bg-primary-600 d-flex justify-content-center align-items-center rounded-circle h6">
                                            <iconify-icon icon="flowbite:users-group-solid" class="icon"></iconify-icon>
                                        </span>

                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 fw-semibold">{{ $stats['soumise'] }}</h6>
                                            <span class="fw-medium text-secondary-light text-md">Demandes en cours</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Widget End -->
                </div>
            </div>

            <div class="p-0 card h-100 radius-12">
                <div class="flex-wrap gap-3 px-24 py-16 card-header border-bottom bg-base d-flex align-items-center justify-content-start">
                    <div class="flex-wrap gap-3 d-flex align-items-center">
                        <span class="mb-0 text-md fw-medium text-secondary-light">Filtrer par statut :</span>
                        <form method="GET" class="gap-4 align-items-center d-md-flex">
                            <select name="status" onchange="this.form.submit()"
                                class="w-auto py-6 form-select form-select-sm ps-12 radius-12 h-40-px">
                                <option value="">Toutes</option>
                                <option value="soumise" {{ request('status') == 'soumise' ? 'selected' : '' }}>
                                    En cours
                                </option>
                                <option value="acceptee" {{ request('status') == 'acceptee' ? 'selected' : '' }}>
                                    Acceptée
                                </option>
                                <option value="rejetee" {{ request('status') == 'rejetee' ? 'selected' : '' }}>
                                    Rejetée
                                </option>
                            </select>

                            <span class="mb-0 text-md fw-medium text-secondary-light">Offre :</span>

                            <select name="job_id" onchange="this.form.submit()"
                                class="w-auto py-6 form-select form-select-sm ps-12 radius-12 h-40-px">
                                <option value="">Toutes</option>
                                @foreach($jobs as $job)
                                    <option value="{{ $job->id }}" {{ request('job_id') == $job->id ? 'selected' : '' }}>
                                        {{ $job->title }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

                <div class="p-24 card-body">
                    <div class="row gy-4">
                        @forelse($applications as $application)
                            <div class="col-xxl-3 col-md-6 user-grid-card ">
                                <div class="overflow-hidden border position-relative radius-16">
                                    <img src="{{ asset('assets/images/user-grid/user-grid-bg12.png') }}" alt="" class="w-100 object-fit-cover">

                                    @if($application->status !== "acceptee")
                                        <div class="top-0 mt-16 dropdown position-absolute end-0 me-16">
                                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                class="text-white border bg-white-gradient-light w-32-px h-32-px radius-8 border-light-white d-flex justify-content-center align-items-center">
                                                <iconify-icon icon="entypo:dots-three-vertical" class="icon "></iconify-icon>
                                            </button>
                                            <ul class="p-12 border shadow dropdown-menu bg-base">
                                                <li>
                                                    <form action="{{ route('client.jobs.change.apply', $application) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status" value="acceptee">
                                                        <button type="submit" class="gap-10 px-16 py-8 rounded dropdown-item text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center" href="#">
                                                            Récommander le candidat
                                                        </button>
                                                    </form>
                                                </li>
                                                @if($application->status !== "rejetee")
                                                    <li>
                                                        <form action="{{ route('client.jobs.change.apply', $application) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="rejetee">
                                                            <button type="submit" class="gap-10 px-16 py-8 rounded dropdown-item text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center" href="#">
                                                                Rejeter la candidature
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="pb-16 text-center ps-16 pe-16 mt--50">
                                        <img src="{{ asset($application->candidate?->gender == 'masculin' ? 'assets/images/users/user1.png' : 'assets/images/users/user2.png') }}" alt=""
                                            class="border br-white border-width-2-px w-100-px h-100-px rounded-circle object-fit-cover">

                                        <h6 class="mt-4 mb-0 text-lg">Profil anonyme</h6>
                                        <span class="text-secondary-light">{{ $application->candidate?->qualification_level ?? null }}</span>

                                        <div class="gap-4 p-12 position-relative bg-danger-gradient-light radius-8 d-flex align-items-center">
                                            <div class="text-center w-100">
                                                <h6 class="mb-0 text-md">{{ strlen($application->jobOffer?->title) > 30 ? substr($application->jobOffer?->title, 0, 30) . '...' : $application->jobOffer?->title  ?? 'Titre de l\'offre' }}</h6>
                                                @if($application->status == "acceptee")
                                                    <span class="mb-0 text-sm text-success">Candidature acceptée</span>
                                                @elseif($application->status == "rejetee")
                                                    <span class="mb-0 text-sm text-danger">Candidature rejetée</span>
                                                @else
                                                    <span class="mb-0 text-sm text-warning">Candidature en cours</span>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="{{ route('client.jobs.apply.show', $application) }}"
                                            class="gap-2 p-10 px-12 py-12 mt-16 text-sm bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white btn-sm radius-8 d-flex align-items-center justify-content-center fw-medium w-100">
                                            Voir le profil
                                            <iconify-icon icon="solar:alt-arrow-right-linear"
                                                class="text-xl icon line-height-1"></iconify-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center col-12">
                                <p class="mt-4 mb-0 text-md">Aucune candidature</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="flex-wrap gap-2 mt-24 d-flex align-items-center justify-content-between">
                        <span>
                            Showing {{ $applications->firstItem() }}
                            to {{ $applications->lastItem() ?? $applications->count() }}
                            of {{ $applications->total() }} entries
                        </span>

                        {{ $applications->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
