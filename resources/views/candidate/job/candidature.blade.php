@extends('layouts.app')

@section('content')
<div class="dashboard-main-body nft-page">
    <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
        <h6 class="mb-0 fw-semibold">Mes candidatures</h6>
        <ul class="gap-2 d-flex align-items-center">
            <li class="fw-medium">
            <a href="{{ route('candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                Tableau de bord
            </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Mes candidatures</li>
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
                                <span class="flex-shrink-0 mb-0 text-white w-40-px h-40-px bg-primary-600 d-flex justify-content-center align-items-center rounded-circle h6">
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
                                <span class="flex-shrink-0 mb-0 text-white w-40-px h-40-px bg-primary-600 d-flex justify-content-center align-items-center rounded-circle h6">
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
                                <span class="flex-shrink-0 mb-0 text-white w-40-px h-40-px bg-primary-600 d-flex justify-content-center align-items-center rounded-circle h6">
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

        <div class="col-lg-12">
            <div class="card">
                <div class="flex-wrap gap-3 px-24 py-16 card-header border-bottom bg-base d-flex align-items-center justify-content-between">
                    <div class="flex-wrap gap-3 d-flex align-items-center">
                        {{-- <form class="navbar-search" method="GET">
                            <input type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="w-auto bg-base h-40-px"
                                onchange="this.form.submit()"
                                placeholder="Rechercher une offre">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form> --}}

                        Filtrer par statut :

                       <form method="GET">
                            <select name="status"
                                    onchange="this.form.submit()"
                                    class="w-auto py-6 form-select form-select-sm ps-12 radius-12 h-40-px">
                                <option value="">Toutes</option>
                                <option value="soumise" {{ request('status')=='soumise' ? 'selected' : '' }}>
                                    En cours
                                </option>
                                <option value="acceptee" {{ request('status')=='acceptee' ? 'selected' : '' }}>
                                    Acceptée
                                </option>
                                <option value="rejetee" {{ request('status')=='rejetee' ? 'selected' : '' }}>
                                    Rejetée
                                </option>
                                <option value="annulee" {{ request('status')=='annulee' ? 'selected' : '' }}>
                                    Annulée
                                </option>
                            </select>
                        </form>

                    </div>
                    {{-- <button type="button" class="gap-2 px-12 py-12 text-sm btn btn-primary btn-sm radius-8 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                        <iconify-icon icon="ic:baseline-plus" class="text-xl icon line-height-1"></iconify-icon>
                        Ajouter une offre
                    </button> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 bordered-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Offre</th>
                                    <th>Entreprise</th>
                                    <th>Date</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($applications as $index => $application)
                                <tr>
                                    {{-- Numérotation --}}
                                    <td>
                                        {{ $applications->firstItem() + $index }}
                                    </td>

                                    <td>
                                        {{ $application->jobOffer->title ?? 'Offre supprimée' }}
                                    </td>

                                    <td>
                                        {{ $application->jobOffer->company_name ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $application->created_at->format('d/m/Y') }}
                                    </td>

                                    {{-- Statut --}}
                                    <td class="text-center">
                                        @switch($application->status)
                                            @case('soumise')
                                                <span class="gap-1 px-8 py-4 text-sm border text-warning-600 border-warning-600 radius-4 line-height-1 fw-medium d-flex align-items-center justify-content-center">
                                                    <span class="w-8-px h-8-px bg-warning-main rounded-circle"></span>
                                                    En cours
                                                </span>
                                                @break

                                            @case('embauchee')
                                                <span class="gap-1 px-8 py-4 text-sm border text-success-main border-success-main radius-4 line-height-1 fw-medium d-flex align-items-center justify-content-center">
                                                    <span class="w-8-px h-8-px bg-success-main rounded-circle"></span>
                                                    Acceptée
                                                </span>
                                                @break

                                            @case('non_retenue')
                                                <span class="gap-1 px-8 py-4 text-sm border text-danger-600 border-danger-600 radius-4 line-height-1 fw-medium d-flex align-items-center justify-content-center">
                                                    <span class="w-8-px h-8-px bg-danger-main rounded-circle"></span>
                                                    Rejetée
                                                </span>
                                                @break

                                            @case('annulee')
                                                <span class="gap-1 px-8 py-4 text-sm border text-secondary-600 border-secondary-600 radius-4 line-height-1 fw-medium d-flex align-items-center justify-content-center">
                                                    <span class="w-8-px h-8-px bg-secondary rounded-circle"></span>
                                                    Annulée
                                                </span>
                                                @break
                                        @endswitch
                                    </td>

                                    {{-- Action --}}
                                    <td class="text-center">
                                        @if ($application->status === 'soumise')
                                            <form method="POST"
                                                action="{{ route('candidate.jobs.cancel', $application) }}"
                                                onsubmit="return confirm('Voulez-vous vraiment annuler cette demande ?')">
                                                @csrf
                                                <button class="btn btn-sm btn-danger">
                                                    Annuler
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-secondary-light">—</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-secondary-light">
                                        Aucune demande trouvée
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
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
</div>
@endsection

