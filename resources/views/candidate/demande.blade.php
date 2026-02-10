@extends('layouts.app')

@section('content')
<div class="dashboard-main-body nft-page">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Mes demandes</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
            <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                Tableau de board
            </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Mes demandes</li>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table bordered-table mb-0">
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
                                                <span class="bg-warning-focus text-warning-main px-24 py-4 rounded-pill fw-medium text-sm">
                                                    En cours
                                                </span>
                                                @break

                                            @case('embauchee')
                                                <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">
                                                    Acceptée
                                                </span>
                                                @break

                                            @case('non_retenue')
                                                <span class="bg-danger-focus text-danger-main px-24 py-4 rounded-pill fw-medium text-sm">
                                                    Rejetée
                                                </span>
                                                @break

                                            @case('annulee')
                                                <span class="bg-secondary-focus text-secondary-main px-24 py-4 rounded-pill fw-medium text-sm">
                                                    Annulée
                                                </span>
                                                @break
                                        @endswitch
                                    </td>

                                    {{-- Action --}}
                                    <td class="text-center">
                                        @if ($application->status === 'soumise')
                                            <form method="POST"
                                                action="{{ route('candidate.demande.annuler', $application) }}"
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

