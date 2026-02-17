@extends('layouts.app')

@section('content')
    <div class="dashboard-main-body nft-page">
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Profils récommandés</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('client.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Récommandés</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="p-0 card h-100 radius-12">
                <div class="flex-wrap gap-3 px-24 py-16 card-header border-bottom bg-base d-flex align-items-center justify-content-start">
                    <div class="flex-wrap gap-3 d-flex align-items-center">
                        <span class="mb-0 text-md fw-medium text-secondary-light">Filtrer par métier :</span>
                        <form method="GET" class="gap-4 align-items-center d-md-flex">
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="mage:search"></iconify-icon>
                                </span>
                                <input type="name" name="job_type" class="form-control" value="{{ request('job_type') }}" placeholder="Nom du metier ..">

                            </div>
                            <button class="btn btn-success-600" type="submit">Chercher</button>
                            @if(request('job_type'))
                                <a href="{{ route('client.candidate.index') }}" class="btn btn-neutral-600" type="submit">X Effacer le filtre</a>
                            @endif
                        </form>
                    </div>
                </div>

                <div class="p-24 card-body">
                    <div class="table-responsive scroll-sm">
                        <table class="table mb-0 bordered-table sm-table">
                            <thead>
                                <tr>
                                    <th scope="col">#N°</th>
                                    <th scope="col">Nom Complet</th>
                                    {{-- <th scope="col">Email</th> --}}
                                    <th scope="col">Métier</th>
                                    <th scope="col" class="text-center">Status</th>
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
                                            <img src="{{ asset($profile->candidate?->user?->gender == 'masculin' ? 'assets/images/users/user1.png' : 'assets/images/users/user2.png') }}" alt=""
                                                class="flex-shrink-0 overflow-hidden w-40-px h-40-px rounded-circle me-12">
                                                @if($profile->candidate?->is_certified)
                                                    <span>
                                                        <iconify-icon icon="fa-solid:certificate" class="mb-0 text-primary-500"></iconify-icon>
                                                    </span>
                                                @endif
                                            <div class="flex-grow-1">
                                                <a href="{{ route('client.candidate.recommended.show', $profile->candidate?->user) }}">
                                                    <span class="mb-0 text-md fw-semibold text-secondary-light">Profile anonyme</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <span class="mb-0 text-md fw-normal text-secondary-light">{{ $profile->candidate?->user?->email ?? '---' }}</span>
                                    </td> --}}
                                    <td>{{ $profile->candidate?->job_type ?? '---' }}</td>
                                    <td class="text-center">
                                        @if( $profile->candidate?->user?->is_active)
                                            <span class="px-24 py-4 text-sm border bg-success-focus text-success-600 border-success-main radius-4 fw-medium">Active</span>
                                        @else
                                            <span class="px-24 py-4 text-sm border bg-neutral-200 text-neutral-600 border-neutral-400 radius-4 fw-medium">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-10 d-flex align-items-center justify-content-center">
                                            <a href="{{ route('client.candidate.recommended.show', $profile->candidate?->user) }}"
                                                class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                <iconify-icon icon="majesticons:eye-line" class="text-xl icon"></iconify-icon>
                                            </a>

                                            {{-- Supprimer --}}
                                            <form method="POST"
                                                action="{{ route('client.candidate.recommended.cancel', $profile) }}"
                                                onsubmit="return confirm('Voulez-vous vraiment supprimer cette recommandation ?')">
                                                @csrf
                                                <button class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty

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
