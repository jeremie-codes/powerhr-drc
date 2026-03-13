@extends('layouts.app')

@section('content')
    <div class="dashboard-main-body nft-page">
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Liste des clients</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('admin.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Clients</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="p-0 card h-100 radius-12">
                <div class="flex-wrap gap-3 px-24 py-16 card-header border-bottom bg-base d-flex align-items-center justify-content-start">
                    <div class="flex-wrap gap-3 d-flex align-items-center w-100">
                        <span class="mb-0 text-md fw-medium text-secondary-light">Filtre :</span>
                        <form method="GET" class="gap-4 align-items-center d-md-flex">
                            <select class="form-select form-select" name="role">
                                <option value="" selected>Tout</option>
                                <option value="client">Client</option>
                                <option value="prospect">Prospect</option>
                            </select>

                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="mage:search"></iconify-icon>
                                </span>
                                <input type="text" name="name" class="form-control" value="{{ request('name') }}" placeholder="Nom du client .." style="min-width: 200px;">
                            </div>
                            <button class="btn btn-success-600" type="submit">Filtrer</button>
                        </form>
                        @if(request('name'))
                            <a href="{{ route('admin.client.index') }}" class="btn btn-neutral-600" type="submit">X Effacer le filtre</a>
                        @endif
                    </div>
                </div>

                <div class="p-24 card-body">
                    <div class="table-responsive scroll-sm">
                        <table class="table mb-0 bordered-table sm-table">
                            <thead>
                                <tr>
                                    <th scope="col">#N°</th>
                                    <th scope="col">Compte Utilisateur</th>
                                    <th scope="col">Entreprise</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Secteur</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clients as $index => $client)
                                <tr>
                                    <td>
                                        <div class="gap-10 d-flex align-items-center">
                                            {{ $index + 1 }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 overflow-hidden bg-light-600 w-40-px h-40-px rounded-circle me-12">
                                                <img src="{{ asset($client->image ? 'storage/' . $client->image : 'build/images/users/avatar-1.png') }}" alt=""
                                                    class="object-cover">
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="{{ route('admin.client.show', $client) }}">
                                                    <span class="mb-0 text-md fw-semibold text-secondary-light">{{ $client->name ?? '---' }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <a href="{{ $client->company ? route('admin.client.show', $client) : '#!' }}">
                                                    <span class="mb-0 text-md fw-semibold text-secondary-light">{{ $client->company?->name ?? '---' }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-md fw-normal text-secondary-light">
                                            {{ $client->role ?? '---' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-md fw-normal text-secondary-light">
                                            {{ $client->email ?? $client->company?->email_hr ?? $client->company?->email_dg ?? '---' }}
                                        </span>
                                    </td>
                                    <td>{{ $client->company?->sector ?? '---' }}</td>
                                    <td class="text-center">
                                        @if( $client->is_active)
                                            <span class="px-24 py-4 text-sm border bg-success-focus text-success-600 border-success-main radius-4 fw-medium">Active</span>
                                        @else
                                            <span class="px-24 py-4 text-sm border bg-neutral-200 text-neutral-600 border-neutral-400 radius-4 fw-medium">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="gap-10 d-flex align-items-center justify-content-center">
                                            <a href="{{ route('admin.client.show', $client) }}"
                                                class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                <iconify-icon icon="majesticons:eye-line" class="text-xl icon"></iconify-icon>
                                            </a>
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
                            Showing {{ $clients->firstItem() }}
                            to {{ $clients->lastItem() ?? $clients->count() }}
                            of {{ $clients->total() }} entries
                        </span>

                        {{ $clients->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
