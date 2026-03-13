@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Client</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                <a href="{{ route('admin.client.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                    Liste des clients
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Client-details</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="overflow-hidden border user-grid-card position-relative radius-16 bg-base h-100">
                    <img src="{{ asset('assets/images/user-grid/user-grid-bg1.png') }}" alt="" class="w-100 object-fit-cover">
                    <div class="pb-24 mb-24 ms-16 me-16 mt--100">
                        <div class="text-center border border-top-0 border-start-0 border-end-0">
                            <img src="{{ asset($client->image ? 'storage/' . $client->image : 'build/images/users/avatar-1.png') }}" alt=""
                                class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover bg-blue-light">

                            <h6 class="mt-16 mb-0 text-lg">{{ $client->name }}</h6>
                            <span class="mb-16 text-secondary-light">{{ $client->email }}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="mb-16 text-lg">Information Personnelle</h6>
                            <ul>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Nom complet</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $client->name ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $client->email ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Pays</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $client?->country->name ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Langue</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $client->langue ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Accès : </span>
                                    <span class="w-70 {{ $client->is_active ? 'text-success' : 'text-danger' }} fw-medium">: {{ $client->is_active ? 'Activé' : 'Désactivé' }}</span>
                                </li>
                            </ul>
                        </div>

                        <hr class="mb-12">

                        <div class="gap-2 d-flex align-items-center justify-content-center">
                            <form method="POST"
                                  action="{{ route('admin.client.update', $client) }}"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir modifier ces accès ?')">
                                @csrf
                                <input type="hidden" name="is_active" value="{{ $client->is_active ? '0' : '1' }}">
                                <button class="gap-1 btn btn-sm {{ $client->is_active ? ' btn-danger' : ' btn-success' }} radius-8 d-inline-flex align-items-center">
                                    <i class="text-xl ri-user-forbid-line menu-icon"></i>
                                    {{ $client->is_active ? 'Désactiver les accès' : 'Activer les accès' }}
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="bg-white border shadow-4 radius-8">

                    {{-- HEADer --}}
                    <div class="p-20 d-flex align-items-center justify-content-between border-bottom">
                        <div>
                            <h6 class="text-lg">Information de l'entreprise</h6>
                            <p>Profil : {{ $client->role ?? '' }}</p>
                        </div>
                    </div>

                    @if($client->company)
                    {{-- TOP BODY --}}
                    <div class="flex-wrap gap-3 p-20 d-flex justify-content-between border-bottom">
                        <div>
                            <h6 class="mb-8 text-xl">
                                {{ $client->company?->name ?? 'Entreprise non définie' }}
                            </h6>
                            <p class="mb-1 text-sm">
                                Créé le : {{ $client->company?->created_at->format('d/m/Y') ?? '---' }}
                            </p>
                            <p class="mb-0 text-sm">
                                Téléphone : {{ $client->company?->phone ?? '---' }}
                            </p>
                            <p class="mb-0 text-sm">
                                Siège : {{ $client->company?->address ?? '---' }}
                            </p>
                        </div>

                        <div style="text-align: right" class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset($client->image ? 'storage/' . $client->image : 'images/company.png') }}" alt=""
                                 class="object-cover w-76-px rounded-8">
                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="px-20 py-28">

                        {{-- Infos principales --}}
                        <div class="flex-wrap gap-3 d-flex justify-content-between align-items-end">
                            <div>
                                <table class="text-sm text-secondary-light">
                                    <tbody>
                                    <tr>
                                        <td>Site web </td>
                                        <td class="ps-8">: {{ $client->company->website ?? '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Secteur d'activité</td>
                                        <td class="ps-8">: {{ $client->company->sector ?? '---' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pays</td>
                                        <td class="ps-8">
                                            : {{ $client->country->name ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rccm</td>
                                        <td class="ps-8">
                                            : {{ $client->company->rccm ?? '---' }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div>
                                <table class="text-sm text-secondary-light">
                                    <tbody>
                                    <tr>
                                        <td>Ville</td>
                                        <td class="ps-8">
                                            : {{ $client->company->city ?? '---' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email DG</td>
                                        <td class="ps-8">
                                            : {{ $client->company->email_dg ?? '---' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email HR</td>
                                        <td class="ps-8">
                                            : {{ $client->company->email_hr ?? '---' }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="my-24">

                        <div>
                            <h6 class="text-md">
                                Autorisations
                            </h6>

                            <table class="text-sm text-secondary-light">
                                <tbody>
                                    <tr>
                                        <td>Peut publier les offres ?</td>
                                        <td class="ps-8 {{ $client->company?->can_post ? 'text-success' : 'text-danger' }}">
                                            : {{ $client->company?->can_post ? 'Oui' : 'Non' }}
                                        </td>
                                        <td class="ps-8">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status entreprise </td>
                                        <td class="ps-8 {{ $client->company?->is_active ? 'text-success' : 'text-danger' }}">
                                            : {{ $client->company?->is_active ? 'Actif' : 'Désactivé' }}
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="mt-24">

                        {{-- DESCRIPTION --}}
                        <div class="mt-24">
                            <div class="gap-3 d-flex align-items-center justify-content-end">
                                <a href="{{ route('admin.client.edit', $client) }}" class="gap-2 btn btn-sm btn-primary d-flex">
                                    <iconify-icon icon="heroicons:pencil" class="text-xl"></iconify-icon>
                                    <span>Editer</span>
                                </a>

                                {{-- Postuler --}}
                                <form method="POST" action="{{ route('admin.jobs.delete', $client->id) }}" onsubmit="return confirm('Voulez-vous vraiment supprimer cette offre ?')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger gx-2">
                                        <i class="ri-delete-bin-6-line"></i>
                                        <span>Supprimer</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                        <p class="p-20 text-lg text-center">
                            Profil entreprise non rempli.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
