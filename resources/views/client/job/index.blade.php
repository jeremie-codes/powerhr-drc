@extends('layouts.app')

@section('content')
    <div class="dashboard-main-body nft-page">
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Liste d'offres</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('client.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Offres</li>
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
                                            <iconify-icon icon="flowbite:briefcase-solid" class="icon"></iconify-icon>
                                        </span>

                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 fw-semibold">{{ $stats['count'] }}</h6>
                                            <span class="fw-medium text-secondary-light text-md">Offres publiées</span>
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
                                            <iconify-icon icon="flowbite:briefcase-solid" class="icon"></iconify-icon>
                                        </span>

                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 fw-semibold">{{ $stats['active'] }}</h6>
                                            <span class="fw-medium text-secondary-light text-md">Offres actives</span>

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
                                            <iconify-icon icon="flowbite:briefcase-solid" class="icon"></iconify-icon>
                                        </span>

                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 fw-semibold">{{ $stats['inactive'] }}</h6>
                                            <span class="fw-medium text-secondary-light text-md">Offres inactives</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Widget End -->
                </div>
            </div>

            <div class="col-xxl-3">
                <div class="p-0 card h-100">
                    <div class="p-24 card-body">
                        <button type="button"
                            class="gap-2 px-12 py-12 mb-16 text-sm btn btn-primary btn-sm w-100 radius-8 d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <iconify-icon icon="fa6-regular:square-plus" class="text-lg icon line-height-1"></iconify-icon>
                            Secteur d'activité
                        </button>

                        <div class="mt-16">
                            <ul>
                                {{-- Toutes les catégories --}}
                                <li class="mb-4 {{ request('category') ? '' : 'item-active' }}">
                                    <a href="{{ route('client.jobs.index') }}"
                                        class="px-12 py-8 bg-hover-primary-50 w-100 radius-8 text-secondary-light">
                                        <span class="gap-10 d-flex align-items-center justify-content-between w-100">
                                            <span class="fw-semibold">Tous les secteurs</span>
                                            <span class="fw-medium">{{ $jobs->total() }}</span>
                                        </span>
                                    </a>
                                </li>

                                {{-- Catégories dynamiques --}}
                                @foreach ($categories as $category)
                                    <li class="mb-4 {{ request('category') == $category->id ? 'item-active' : '' }}">
                                        <a href="{{ route('client.jobs.index', ['category' => $category->id]) }}"
                                            class="px-12 py-8 bg-hover-primary-50 w-100 radius-8 text-secondary-light">
                                            <span class="gap-10 d-flex align-items-center justify-content-between w-100">
                                                <span class="fw-semibold">{{ $category->name }}</span>
                                                <span class="fw-medium">{{ $category->jobs_count }}</span>
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="p-0 card h-100 radius-12">
                    <div
                        class="flex-wrap gap-3 px-24 py-16 card-header border-bottom bg-base d-flex align-items-center justify-content-between">
                        <div class="flex-wrap gap-3 d-flex align-items-center">
                            Filtrer par statut :

                            <form method="GET">
                                <select name="status" onchange="this.form.submit()"
                                    class="w-auto py-6 form-select form-select-sm ps-12 radius-12 h-40-px">
                                    <option value="">Toutes</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>
                                        Actives
                                    </option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>
                                        Inactives
                                    </option>
                                </select>
                            </form>

                        </div>
                        <a href="{{ route('client.jobs.create') }}" class="gap-2 px-12 py-12 text-sm btn btn-primary btn-sm radius-8 d-flex align-items-center">
                            <iconify-icon icon="ic:baseline-plus" class="text-xl icon line-height-1"></iconify-icon>
                            Ajouter une offre
                        </a>
                    </div>
                    <div class="p-24 card-body">
                        <div class="table-responsive scroll-sm">
                            <table class="table mb-0 bordered-table sm-table">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Poste</th>
                                        <th>Lieu</th>
                                        <th>Contrat</th>
                                        <th>Expire le</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jobs as $index => $job)
                                        <tr>
                                            {{-- <td>{{ $jobs->firstItem() + $index }}</td> --}}

                                            <td class="fw-semibold">
                                                <a href="{{ route('client.jobs.show', $job) }}">{{ $job->title }}</a>
                                            </td>

                                            <td>{{ $job->location }}</td>

                                            <td>{{ $job->contract_type ?? '-' }}</td>

                                            <td>
                                                @if ($job->expires_at)
                                                    <span
                                                        class="{{ $job->expires_at->diffInDays(now()) <= 3 ? 'text-danger' : '' }}">
                                                        {{ $job->expires_at->format('d/m/Y') }}
                                                    </span>
                                                @else
                                                    <span class="text-success">Illimitée</span>
                                                @endif
                                            </td>

                                            {{-- Actions --}}
                                            <td class="text-center">
                                                <div class="gap-2 d-flex justify-content-center">

                                                    {{-- Voir --}}
                                                    <a href="{{ route('client.jobs.show', $job) }}"
                                                        title="Voir l’offre" class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                        <iconify-icon icon="majesticons:eye-line" class="text-xl icon"></iconify-icon>
                                                    </a>

                                                    {{-- Editer --}}
                                                    <a href="{{ route('client.jobs.edit', $job) }}"
                                                        title="Modifier l’offre" class="bg-warning-focus text-warning-600 bg-hover-warning-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                        <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                                    </a>

                                                    {{-- Supprimer --}}
                                                    <form method="POST"
                                                        action="{{ route('client.jobs.delete', $job->id) }}"
                                                        onsubmit="return confirm('Voulez-vous vraiment supprimer cette offre ?')">
                                                        @csrf
                                                        <button class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                            <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-secondary-light">
                                                Aucune offre publiée pour le moment.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="flex-wrap gap-2 mt-24 d-flex align-items-center justify-content-between">
                            <span>
                                Showing {{ $jobs->firstItem() }}
                                to {{ $jobs->lastItem() ?? $jobs->count() }}
                                of {{ $jobs->total() }} entries
                            </span>

                            {{ $jobs->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
