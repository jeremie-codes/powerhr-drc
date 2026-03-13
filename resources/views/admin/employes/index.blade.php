@extends('layouts.app')

@section('content')
    <div class="dashboard-main-body nft-page">
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Liste des employés</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('admin.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Employés</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="p-0 card h-100 radius-12">
                <div
                    class="flex-wrap gap-3 px-24 py-16 card-header border-bottom bg-base d-flex align-items-center justify-content-start">
                    <div class="flex-wrap gap-3 d-flex align-items-center">
                        <span class="mb-0 text-md fw-medium text-secondary-light">Filtre :</span>
                        <form method="GET" class="gap-4 align-items-center d-md-flex">
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="mage:search"></iconify-icon>
                                </span>
                                <input type="text" name="name" class="form-control" value="{{ request('name') }}" placeholder="Nom du candidat ..">

                            </div>
                            <button class="btn btn-success-600" type="submit">Chercher</button>
                        </form>
                        @if(request('name'))
                            <a href="{{ route('admin.candidate.index') }}" class="btn btn-neutral-600" type="submit">X Effacer le filtre</a>
                        @endif
                    </div>
                </div>

                <div class="p-24 card-body">
                    <div class="table-responsive scroll-sm">
                        <table class="table mb-0 bordered-table sm-table">
                            <thead>
                                <tr>
                                    <th scope="col">#N°</th>
                                    <th scope="col">Nom Complet</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Métier</th>
                                    <th scope="col">Employeur</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($profiles as $index => $profile)
                                <tr>
                                    <td>
                                        <div class="gap-10 d-flex align-items-center">
                                            {{ $index + 1 }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 overflow-hidden w-40-px h-40-px rounded-circle me-12 bg-light-100">
                                                <img src="{{ asset($profile->image ? 'storage/' . $profile->image : 'assets/images/users/user1.png') }}" alt=""
                                                     class="object-cover">
                                            </div>
                                            @if($profile->candidate?->is_certified)
                                                <span>
                                                    <iconify-icon icon="fa-solid:certificate" class="mb-0 text-primary-500"></iconify-icon>
                                                </span>
                                            @endif
                                            <div class="flex-grow-1">
                                                <a href="{{ route('admin.candidate.show', $profile) }}">
                                                    <span class="mb-0 text-md fw-semibold text-secondary-light">{{ $profile->name ?? '---' }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-md fw-normal text-secondary-light">{{ $profile->email ?? '---' }}</span>
                                    </td>
                                    <td>{{ $profile->candidate?->job_type ?? '---' }}</td>
                                    <td class="text-center fw-bold">
                                        {{ $profile->candidate?->employedAt?->name ?? '---' }}
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-10 d-flex align-items-center justify-content-center">
                                            <a href="{{ route('admin.candidate.show', $profile) }}"
                                                class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                <iconify-icon icon="majesticons:eye-line" class="text-xl icon"></iconify-icon>
                                            </a>
                                            <a href="{{ route('admin.candidate.show', $profile) }}"
                                                class="bg-warning-focus bg-hover-warning-200 border border-warning text-warning-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                <iconify-icon icon="majesticons:pencil-line" class="text-xl icon"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                       <td colspan="6" class="text-center">Aucun candidat employé trouvée !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="flex-wrap gap-2 mt-24 d-flex align-items-center justify-content-between">
                        <span>
                            Showing {{ $profiles->firstItem() }}
                            to {{ $profiles->lastItem() ?? $profiles->count() }}
                            of {{ $profiles->total() }} entries
                        </span>

                        {{ $profiles->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
