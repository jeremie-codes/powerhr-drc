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
                    Accueil
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Tableau de board </li>
            </ul>
        </div>

        {{-- content --}}
        <div class="row gy-4">
            <div class="col-xxl-8">
                <div class="row gy-4">
                    <div class="col-12">
                        <div class="overflow-hidden nft-promo-card card radius-12 position-relative z-1">
                            <img src="{{ asset('assets/images/nft/nft-gradient-bg.png') }}" class="top-0 position-absolute start-0 w-100 h-100 z-n1" alt="">
                            <div class="nft-promo-card__inner d-flex align-items-center">
                                <div class="nft-promo-card__thumb w-25">
                                    <img src="{{ asset('build/images/users/avatar-1.png') }}" alt="" class="w-100 h-100 object-fit-contain">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="text-white">{{ $user->name ?? null }}</h6>
                                    <div class=" text-white text-md">Bienvenue à nouveau!</div>
                                    <p class="text-white text-sm">{{ $user->bio ?? "" }}</p>
                                    <p class="text-white text-md">{{ $user->candidate ? "" : "Vous n'avez pas terminer à remplir votre profil !" }}</p>
                                    <div class="flex-wrap gap-16 mt-24 d-flex align-items-center">
                                        {{-- <a href="#" class="px-32 text-white border btn rounded-pill br-white radius-8 py-11 hover-bg-white text-hover-neutral-900">Explore</a> --}}
                                        <a href="#" class="btn rounded-pill btn-primary-600 radius-8 px-28 py-11">Configurer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <h6 class="mb-16">Trending Bids</h6>
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
                                                <h6 class="mb-0 fw-semibold">24,000</h6>
                                                <span class="fw-medium text-secondary-light text-md">Artworks</span>
                                                <p class="flex-wrap gap-12 mt-12 mb-0 text-sm d-flex align-items-center">
                                                    <span class="gap-8 px-6 py-2 text-sm bg-success-focus rounded-2 fw-medium text-success-main d-flex align-items-center">
                                                        +168.001%
                                                        <i class="ri-arrow-up-line"></i>
                                                    </span> This week
                                                </p>
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
                                                <h6 class="mb-0 fw-semibold">82,000</h6>
                                                <span class="fw-medium text-secondary-light text-md">Auction</span>
                                                <p class="flex-wrap gap-12 mt-12 mb-0 text-sm d-flex align-items-center">
                                                    <span class="gap-8 px-6 py-2 text-sm bg-danger-focus rounded-2 fw-medium text-danger-main d-flex align-items-center">
                                                        +168.001%
                                                        <i class="ri-arrow-down-line"></i>
                                                    </span> This week
                                                </p>
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
                                                <h6 class="mb-0 fw-semibold">800</h6>
                                                <span class="fw-medium text-secondary-light text-md">Creators</span>
                                                <p class="flex-wrap gap-12 mt-12 mb-0 text-sm d-flex align-items-center">
                                                    <span class="gap-8 px-6 py-2 text-sm bg-success-focus rounded-2 fw-medium text-success-main d-flex align-items-center">
                                                        +168.001%
                                                        <i class="ri-arrow-up-line"></i>
                                                    </span> This week
                                                </p>
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

            <div class="col-xxl-4">
                <div class="row gy-4">
                    <div class="col-xxl-12 col-md-6">
                        <div class="card h-100">
                            <div class="flex-wrap gap-2 card-header border-bottom d-flex align-items-center justify-content-between">
                                <h6 class="mb-0 text-lg fw-bold">ETH Price</h6>
                                <select class="w-auto border form-select form-select-sm bg-base text-secondary-light radius-8 rounded-pill">
                                    <option>November </option>
                                    <option>December</option>
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <div id="enrollmentChart" class="apexcharts-tooltip-style-1 yaxies-more"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-md-6">
                        <div class="card h-100">
                            <div class="flex-wrap gap-2 card-header border-bottom d-flex align-items-center justify-content-between">
                                <h6 class="mb-0 text-lg fw-bold">Statistics</h6>
                                <a href="javascript:void(0)" class="gap-1 text-primary-600 hover-text-primary d-flex align-items-center">
                                    View All
                                    <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="gap-1 d-flex align-items-center justify-content-between mb-44">
                                    <div>
                                        <h5 class="mb-12 fw-semibold">145</h5>
                                        <span class="text-xl text-secondary-light fw-normal">Total Art Sold</span>
                                    </div>
                                    <div id="dailyIconBarChart"></div>
                                </div>
                                <div class="gap-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="mb-12 fw-semibold">750 ETH</h5>
                                        <span class="text-xl text-secondary-light fw-normal">Total Earnings</span>
                                    </div>
                                    <div id="areaChart"></div>
                                </div>
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
        // ===================== Average Enrollment Rate Start ===============================
        function createChartTwo(chartId, color1, color2) {
            var options = {
                series: [{
                    name: 'series2',
                    data: [20000, 45000, 30000, 50000, 32000, 40000, 30000, 42000, 28000, 34000, 38000, 26000]
                }],
                legend: {
                    show: false
                },
                chart: {
                    type: 'area',
                    width: '100%',
                    height: 240,
                    toolbar: {
                        show: false
                    },
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight',
                    width: 3,
                    colors: [color1], // Use two colors for the lines
                    lineCap: 'round'
                },
                grid: {
                    show: true,
                    borderColor: '#D1D5DB',
                    strokeDashArray: 1,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                    row: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    column: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    padding: {
                        top: -20,
                        right: 0,
                        bottom: 0,
                        left: 0
                    },
                },
                fill: {
                    type: 'gradient',
                    colors: [color1], // Use two colors for the gradient
                    // gradient: {
                    //     shade: 'light',
                    //     type: 'vertical',
                    //     shadeIntensity: 0.5,
                    //     gradientToColors: [`${color1}`, `${color2}00`], // Bottom gradient colors with transparency
                    //     inverseColors: false,
                    //     opacityFrom: .6,
                    //     opacityTo: 0.3,
                    //     stops: [0, 100],
                    // },
                    gradient: {
                        shade: 'light',
                        type: 'vertical',
                        shadeIntensity: 0.5,
                        gradientToColors: [undefined, `${color2}00`], // Apply transparency to both colors
                        inverseColors: false,
                        opacityFrom: [0.4, 0.4], // Starting opacity for both colors
                        opacityTo: [0.1, 0.1], // Ending opacity for both colors
                        stops: [0, 100],
                    },
                },
                markers: {
                    colors: [color1], // Use two colors for the markers
                    strokeWidth: 3,
                    size: 0,
                    hover: {
                        size: 10
                    }
                },
                xaxis: {
                    labels: {
                        show: false
                    },
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    tooltip: {
                        enabled: false
                    },
                    labels: {
                        formatter: function (value) {
                            return value;
                        },
                        style: {
                            fontSize: "12px"
                        }
                    }
                },
                yaxis: {
                    labels: {
                        // formatter: function (value) {
                        //     return "$" + value + "k";
                        // },
                        style: {
                            fontSize: "12px"
                        }
                    },
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }

        createChartTwo('enrollmentChart', '#487FFF');
        // ===================== Average Enrollment Rate End ===============================


        // ===================== Delete Table Item Start ===============================
        $('.remove-btn').on('click', function () {
            $(this).closest('tr').addClass('d-none');
        });
        // ===================== Delete Table Item End ===============================



        // ================================ Area chart Start ================================
        function createChart(chartId, chartColor) {

            let currentYear = new Date().getFullYear();

            var options = {
                series: [
                    {
                        name: 'series1',
                        data: [0, 10, 8, 25, 15, 26, 13, 35, 15, 39, 16, 46, 42],
                    },
                ],
                chart: {
                    type: 'area',
                    width: 164,
                    height: 72,

                    sparkline: {
                        enabled: true // Remove whitespace
                    },

                    toolbar: {
                        show: false
                    },
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2,
                    colors: [chartColor],
                    lineCap: 'round'
                },
                grid: {
                    show: true,
                    borderColor: 'transparent',
                    strokeDashArray: 0,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: false
                        }
                    },
                    row: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    column: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    padding: {
                        top: -3,
                        right: 0,
                        bottom: 0,
                        left: 0
                    },
                },
                fill: {
                    type: 'gradient',
                    colors: [chartColor], // Set the starting color (top color) here
                    gradient: {
                        shade: 'light', // Gradient shading type
                        type: 'vertical',  // Gradient direction (vertical)
                        shadeIntensity: 0.5, // Intensity of the gradient shading
                        gradientToColors: [`${chartColor}00`], // Bottom gradient color (with transparency)
                        inverseColors: false, // Do not invert colors
                        opacityFrom: .8, // Starting opacity
                        opacityTo: 0.3,  // Ending opacity
                        stops: [0, 100],
                    },
                },
                // Customize the circle marker color on hover
                markers: {
                    colors: [chartColor],
                    strokeWidth: 2,
                    size: 0,
                    hover: {
                    size: 8
                    }
                },
                xaxis: {
                    labels: {
                        show: false
                    },
                    categories: [`Jan ${currentYear}`, `Feb ${currentYear}`, `Mar ${currentYear}`, `Apr ${currentYear}`, `May ${currentYear}`, `Jun ${currentYear}`, `Jul ${currentYear}`, `Aug ${currentYear}`, `Sep ${currentYear}`, `Oct ${currentYear}`, `Nov ${currentYear}`, `Dec ${currentYear}`],
                    tooltip: {
                        enabled: false,
                    },
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }

        // Call the function for each chart with the desired ID and color
        createChart('areaChart', '#FF9F29');
        // ================================ Area chart End ================================
    </script>
@endsection
