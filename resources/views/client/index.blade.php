@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Accueil</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="index.html" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Accueil</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="row gy-4">

            @if(auth()->user()->company == null)
                <div class="col-12">
                    <div class="px-24 mb-10 text-lg alert alert-primary bg-primary-50 text-primary-600 border-primary-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 py-13 fw-semibold radius-4 d-flex align-items-center justify-content-between" role="alert">
                        <div class="gap-2 d-flex align-items-center">
                            <iconify-icon icon="mdi:alert-circle-outline" class="text-xl icon"></iconify-icon>
                            <small>Complétez le profil de votre entreprise pour formaliser vos offres d'emploi. <b><a href="{{ route('client.profile.index') }}">Configurer</a></b></small>
                        </div>
                        <button class="remove-button text-primary-600 text-xxl line-height-1"> <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
                    </div>
                </div>
            @elseif(auth()->user()->role == 'prospect')
                <div class="col-12">
                    <div class="px-24 mb-10 text-lg alert alert-primary bg-primary-50 text-primary-600 border-primary-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 py-13 fw-semibold radius-4 d-flex align-items-center justify-content-between" role="alert">
                        <div class="gap-2 d-flex align-items-center">
                            <iconify-icon icon="mdi:alert-circle-outline" class="text-xl icon"></iconify-icon>
                            <small>Veuillez remplir le contrat le menu <b><a href="{{ route('client.contrat.index') }}">"Contrat"</a></b> avant de publier des offres d'emploi. <b><a href="{{ route('client.contrat.index') }}">Remplir le contrat</a></b></small>
                        </div>
                        <button class="remove-button text-primary-600 text-xxl line-height-1"> <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
                    </div>
                </div>
            @endif

            <div class="col-xxxl-9">
                <div class="row gy-4">
                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                        <div class="p-3 card shadow-2 radius-8 h-100 bg-gradient-end-6">
                            <div class="p-0 card-body">
                                <div class="flex-wrap gap-1 mb-8 d-flex align-items-center justify-content-between">

                                    <div class="gap-2 d-flex align-items-center">
                                        <span
                                            class="flex-shrink-0 mb-0 text-white w-48-px h-48-px bg-cyan-100 text-cyan-600 d-flex justify-content-center align-items-center rounded-circle h6">
                                            <i class="ri-group-fill"></i>
                                        </span>
                                        <div>
                                            <h6 class="mb-2 fw-semibold">{{ $stats['all'] }}</h6>
                                            <span class="text-sm fw-medium text-secondary-light">Offres</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0 text-sm">Total publiés</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                        <div class="p-3 card shadow-2 radius-8 h-100 bg-gradient-end-4">
                            <div class="p-0 card-body">
                                <div class="flex-wrap gap-1 mb-8 d-flex align-items-center justify-content-between">

                                    <div class="gap-2 d-flex align-items-center">
                                        <span
                                            class="flex-shrink-0 mb-0 text-white w-48-px h-48-px bg-success-100 text-success-600 d-flex justify-content-center align-items-center rounded-circle h6">
                                            <i class="ri-group-fill"></i>
                                        </span>
                                        <div>
                                            <h6 class="mb-2 fw-semibold">{{ $stats['active'] }}</h6>
                                            <span class="text-sm fw-medium text-secondary-light">Offres</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0 text-sm">Total actives</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                        <div class="p-3 card shadow-2 radius-8 h-100 bg-gradient-end-1">
                            <div class="p-0 card-body">
                                <div class="flex-wrap gap-1 mb-8 d-flex align-items-center justify-content-between">

                                    <div class="gap-2 d-flex align-items-center">
                                        <span
                                            class="flex-shrink-0 mb-0 text-white w-48-px h-48-px bg-primary-100 text-primary-600 d-flex justify-content-center align-items-center rounded-circle h6">
                                            <i class="ri-group-fill"></i>
                                        </span>
                                        <div>
                                            <h6 class="mb-2 fw-semibold">{{ $stats['inactive'] }}</h6>
                                            <span class="text-sm fw-medium text-secondary-light">Offres</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0 text-sm">Total inactives</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                        <div class="p-3 card shadow-2 radius-8 h-100 bg-gradient-end-1">
                            <div class="p-0 card-body">
                                <div class="flex-wrap gap-1 mb-8 d-flex align-items-center justify-content-between">

                                    <div class="gap-2 d-flex align-items-center">
                                        <span
                                            class="flex-shrink-0 mb-0 text-white w-48-px h-48-px bg-lilac-100 text-lilac-600 d-flex justify-content-center align-items-center rounded-circle h6">
                                            <i class="ri-group-fill"></i>
                                        </span>
                                        <div>
                                            <h6 class="mb-2 fw-semibold">{{ $stats['expiree'] }}</h6>
                                            <span class="text-sm fw-medium text-secondary-light">Offres</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0 text-sm">Total expirées</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border-0 card h-100 radius-8">
                            <div class="px-24 card-body">
                                <div class="flex-wrap gap-2 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="mb-2 text-lg fw-bold">Statistiques candidatures</h6>
                                    </div>

                                    <div class="flex-wrap gap-3 mt-20 d-flex justify-content-center">

                                        <div class="gap-2 p-12 border d-inline-flex align-items-center radius-8 br-hover-primary group-item">
                                            <span
                                                class="bg-neutral-100 w-44-px h-44-px text-xxl radius-8 d-flex justify-content-center align-items-center text-secondary-light group-hover:bg-primary-600 group-hover:text-white">
                                                <iconify-icon icon="uis:chart" class="icon"></iconify-icon>
                                            </span>
                                            <div>
                                                <span class="text-sm text-secondary-light fw-medium">En attente</span>
                                                <h6 class="mb-0 text-md fw-semibold">{{ $demandes['soumise'] }}</h6>
                                            </div>
                                        </div>

                                        <div class="gap-2 p-12 border d-inline-flex align-items-center radius-8 br-hover-primary group-item">
                                            <span
                                                class="bg-neutral-100 w-44-px h-44-px text-xxl radius-8 d-flex justify-content-center align-items-center text-secondary-light group-hover:bg-primary-600 group-hover:text-white">
                                                <iconify-icon icon="uis:chart" class="icon"></iconify-icon>
                                            </span>
                                            <div>
                                                <span class="text-sm text-secondary-light fw-medium">Acceptée</span>
                                                <h6 class="mb-0 text-md fw-semibold">{{ $demandes['acceptee'] }}</h6>
                                            </div>
                                        </div>

                                        <div class="gap-2 p-12 border d-inline-flex align-items-center radius-8 br-hover-primary group-item">
                                            <span
                                                class="bg-neutral-100 w-44-px h-44-px text-xxl radius-8 d-flex justify-content-center align-items-center text-secondary-light group-hover:bg-primary-600 group-hover:text-white">
                                                <iconify-icon icon="uis:chart" class="icon"></iconify-icon>
                                            </span>
                                            <div>
                                                <span class="text-sm text-secondary-light fw-medium">Rejetée</span>
                                                <h6 class="mb-0 text-md fw-semibold">{{ $demandes['rejetee'] }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="barChart" class="barChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3">
                <div class="row gy-2">
                    <!-- Dashboard Widget Start -->
                    <div class="col-12">
                        <div class="overflow-hidden nft-promo-card card radius-12 position-relative z-1">
                            <img src="{{ asset('assets/images/nft/nft-gradient-bg.png') }}"
                                class="top-0 position-absolute start-0 w-100 h-100 z-n1" alt="" />

                            <div class="text-center d-flex nft-promo-card__inner align-items-center justify-content-center">

                                <div class="nft-promo-card__humb">
                                    {{-- <div class="w-100">
                                        <img src="{{ asset($user->image ? 'storage/' . $user->image : 'build/images/users/avatar-1.png') }}"
                                            alt="" class="w-100 h-100 object-fit-contain"
                                            style="border-radius: 100%;">
                                    </div> --}}

                                    <div class="text-center w-100">
                                        <div class="text-white text-md">Bienvenue à nouveau!</div>

                                        <h6 class="text-white ">
                                            {{ $user->name ?? null }}
                                            <p class="text-sm text-white">
                                                {{ 'Profil ' . $user->role }}
                                            </p>
                                        </h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Widget End -->
                    <div class="col-12">
                        <div class="overflow-hidden shadow-7 radius-12 bg-base h-100">
                            <div class="px-24 py-16 card-header border-bottom bg-base d-flex align-items-center justify-content-between">
                                <h6 class="mb-0 text-lg fw-semibold">Candidatures</h6>
                                <a href="{{ route('client.jobs.apply') }}"
                                    class="gap-1 text-primary-600 hover-text-primary d-flex align-items-center">
                                    Voir tout
                                    <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                                </a>
                            </div>
                            <div class="gap-20 p-20 card-body d-flex flex-column">
                                @php
                                    $recentApplications = $demandes['last'] ?? [];
                                @endphp
                                @forelse($recentApplications as $application)
                                    <div class="gap-3 d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($application->candidate?->gender == 'masculin' ? 'assets/images/users/user1.png' : 'assets/images/users/user2.png') }}"
                                                alt="" class="flex-shrink-0 overflow-hidden w-40-px h-40-px rounded-circle me-12"
                                            >
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-md fw-medium">{{ strlen($application->jobOffert?->name) > 15 ? substr($application->jobOffert?->name, 0, 15) . '...' : $application->jobOffert?->name }}</h6>
                                                <span class="text-sm text-secondary-light fw-medium">{{ strlen($subText) > 12 ? substr($subText, 0, 12) . '...' : $subText }}</span>
                                            </div>
                                        </div>
                                        <button type="button" class="px-16 py-6 rounded follow-btn bg-primary-100 text-primary-600">
                                            Voir
                                        </button>
                                    </div>
                                @empty
                                    <div class="text-center"> <p class="mb-0 text-sm text-secondary-light">Aucune candidature récente</p> </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        // ================================ Earning Statistics bar chart Start ================================
        var options = {
            series: [{
                name: "Candidatures",
                data: @json($monthlyData)
            }],
            chart: {
                type: 'bar',
                height: 310,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '23%',
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: [
                    'Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin',
                    'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'
                ]
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return value;
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#barChart"), options);
        chart.render();
        // ================================ Earning Statistics bar chart End ================================
    </script>
@endsection
