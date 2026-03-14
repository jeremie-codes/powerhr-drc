@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Accueil</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
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
            <div class="col-xxl-8">
                <div class="row gy-2">
                    <div class="col-12">
                        <div class="overflow-hidden nft-promo-card card radius-12 position-relative z-1">
                            <img src="{{ asset('assets/images/nft/nft-gradient-bg.png') }}"
                                class="top-0 position-absolute start-0 w-100 h-100 z-n1" alt=""
                            />

                            <div class="p-16 flex- nft-promo-card__inner d-flex align-items-center justify-content-between">
                                <div class=" nft-promo-card__humb overflow-hidden rounded-pill border bg-blue-light" style="width: 150px; height: 150px">
                                    <img src="{{ asset($user->image ? 'storage/' . $user->image : 'build/images/users/avatar-1.png') }}" alt=""
                                        class=" object-cover " style="border-radius: 100%;">
                                </div>

                                <div class="flex-grow-1">
                                    <div class="text-white text-md">Bienvenue à nouveau!</div>

                                    <h6 class="mt-4 text-white">
                                        {{ $user->name ?? null }}
                                        <p class="gap-2 text-sm text-white d-flex align-items-center">
                                            @if($user->candidate?->is_certified)
                                                <span>
                                                    <iconify-icon icon="fa-solid:award" class="mb-0 text-2xl text-white"></iconify-icon>
                                                </span>
                                                <span> Profil certifié</span>
                                            @else
                                                Profil non certifié
                                            @endif
                                        </p>
                                    </h6>

                                    <p class="text-sm text-white">{{ $user->candidate?->summary ?? '' }}</p>
                                    <p class="text-white text-md">
                                        {{ $user->candidate ? '' : "Vous n'avez pas terminer à remplir votre profil !" }}
                                    </p>
                                </div>

                                <div >
                                    <div class="flex-wrap gap-16 mt-24 d-flex align-items-center">
                                        <a href="{{ route('candidate.settings.index') }}" class="btn rounded-pill btn-warning-600 radius-8 px-28 py-11">Voir mon profil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="border-0 card h-100 radius-8">
                            <div class="px-24 card-body">
                                <div class="flex-wrap gap-2 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="mb-2 text-lg fw-bold">Demandes Statistic</h6>
                                    </div>

                                    <div class="flex-wrap gap-3 mt-20 d-flex justify-content-center">

                                        <div class="gap-2 p-2 border d-inline-flex align-items-center radius-8 br-hover-primary group-item">
                                            <span
                                                class="bg-neutral-100 w-44-px h-44-px text-xxl radius-8 d-flex justify-content-center align-items-center text-secondary-light group-hover:bg-primary-600 group-hover:text-white">
                                                <iconify-icon icon="uis:chart" class="icon"></iconify-icon>
                                            </span>
                                            <div>
                                                <span class="text-sm text-secondary-light fw-medium">En attente</span>
                                                <h6 class="mb-0 text-md fw-semibold">{{ $demandes['soumise'] }}</h6>
                                            </div>
                                        </div>

                                        <div class="gap-2 p-2 border d-inline-flex align-items-center radius-8 br-hover-primary group-item">
                                            <span
                                                class="bg-neutral-100 w-44-px h-44-px text-xxl radius-8 d-flex justify-content-center align-items-center text-secondary-light group-hover:bg-primary-600 group-hover:text-white">
                                                <iconify-icon icon="uis:chart" class="icon"></iconify-icon>
                                            </span>
                                            <div>
                                                <span class="text-sm text-secondary-light fw-medium">Acceptée</span>
                                                <h6 class="mb-0 text-md fw-semibold">{{ $demandes['acceptee'] }}</h6>
                                            </div>
                                        </div>

                                        <div class="gap-2 p-2 border d-inline-flex align-items-center radius-8 br-hover-primary group-item">
                                            <span
                                                class="bg-neutral-100 w-44-px h-44-px text-xxl radius-8 d-flex justify-content-center align-items-center text-secondary-light group-hover:bg-primary-600 group-hover:text-white">
                                                <iconify-icon icon="uis:chart" class="icon"></iconify-icon>
                                            </span>
                                            <div>
                                                <span class="text-sm text-secondary-light fw-medium">Rejetée</span>
                                                <h6 class="mb-0 text-md fw-semibold">{{ $demandes['rejetee'] }}</h6>
                                            </div>
                                        </div>

                                        <div class="gap-2 p-2 border d-inline-flex align-items-center radius-8 br-hover-primary group-item">
                                            <span
                                                class="bg-neutral-100 w-44-px h-44-px text-xxl radius-8 d-flex justify-content-center align-items-center text-secondary-light group-hover:bg-primary-600 group-hover:text-white">
                                                <iconify-icon icon="uis:chart" class="icon"></iconify-icon>
                                            </span>
                                            <div>
                                                <span class="text-sm text-secondary-light fw-medium">Annulée</span>
                                                <h6 class="mb-0 text-md fw-semibold">{{ $demandes['annulee'] }}</h6>
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

            <div class="col-xxl-4">
                <div class="row gy-2">
                     <div class="col-xxl-12 col-md-6">
                        <div class="overflow-hidden border-0 card h-100 radius-8">
                            <div class="card-header">
                                <h6 class="mb-0 text-lg fw-bold">Vue d'ensemble des offres</h6>
                            </div>

                            <div class="p-24 card-body">

                                <div class="flex-wrap mt-3 d-flex align-items-center">
                                    <ul class="flex-shrink-0">
                                        <li class="gap-2 d-flex align-items-center mb-28">
                                            <span class="w-12-px h-12-px rounded-circle bg-success-main"></span>
                                            <span class="text-sm text-secondary-light fw-medium">Total: {{ $stats['count'] }}</span>
                                        </li>
                                        <li class="gap-2 d-flex align-items-center mb-28">
                                            <span class="w-12-px h-12-px rounded-circle bg-warning-main"></span>
                                            <span class="text-sm text-secondary-light fw-medium">Active: {{ $stats['active'] }}</span>
                                        </li>
                                        <li class="gap-2 d-flex align-items-center">
                                            <span class="w-12-px h-12-px rounded-circle bg-primary-600"></span>
                                            <span class="text-sm text-secondary-light fw-medium">Inactive: {{ $stats['inactive'] }}</span>
                                        </li>
                                    </ul>
                                    <div id="donutChart" class="flex-grow-1 apexcharts-tooltip-z-none title-style circle-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Widget Start -->
                    <div class="col-xxl-12 col-md-6">
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
                    <div class="col-xxl-12 col-md-6">
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
                    <div class="col-xxl-12 col-md-6">
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
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '23%',
                }
            },
            dataLabels: { enabled: false },
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

        // ================================ Custom Overview Donut chart Start ================================
        var options = {
            series: [{{ $stats['count'] }}, {{ $stats['active'] }}, {{ $stats['inactive'] }}],
            colors: ['#45B369', '#FF9F29', '#487FFF'],
            labels: ['Total', 'Actives', 'Inactives'],
            legend: {
                show: false
            },
            chart: {
                type: 'donut',
                height: 300,
                sparkline: {
                    enabled: true // Remove whitespace
                },
                margin: {
                    top: -100,
                    right: -100,
                    bottom: -100,
                    left: -100
                },
                padding: {
                    top: -100,
                    right: -100,
                    bottom: -100,
                    left: -100
                }
            },
            stroke: {
                width: 0,
            },
            dataLabels: {
                enabled: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            plotOptions: {
                pie: {
                    startAngle: -90,
                    endAngle: 90,
                    offsetY: 10,
                    customScale: 0.8,
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            total: {
                                showAlways: true,
                                show: true,
                                label: 'Offers Report',
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b;
                                    }, 0);
                                }
                            }
                        },
                    }
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#donutChart"), options);
        chart.render();
        // ================================ Custom Overview Donut chart End ================================
    </script>
@endsection
