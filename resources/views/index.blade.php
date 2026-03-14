<!DOCTYPE html>
<html lang="en">

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content />
    <meta name="author" content />
    <meta name="robots" content />
    <meta name="description" content />

    <!-- FAVICONS ICON -->
    {{-- <link rel="icon" href="images/favicon.png" type="image/x-icon" /> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />

    <!-- PAGE TITLE HERE -->
    <title>Accueil | Power HR</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"><!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.min.css') }}">
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lc_lightbox.css') }}"><!-- Lc light box popup -->
    <!-- DATA table STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/scrollbar.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}">
    <!-- Flaticon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper-bundle.min.css') }}"><!-- Swiper Slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"><!-- MAIN STYLE SHEET -->

    <!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" class="skin" type="text/css" href="{{ asset('css/skins-type/skin-6.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.29.2/dist/feather.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons-css@1.2.0/css/feather.min.css"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@flaticon/flaticon-uicons@3.3.1/license.min.js"></script> --}}
    <style>
        @media (min-width: 995px) {
            .head-text {
                position: relative;
                top: -150px;
            }
        }
    </style>

</head>

<body>

    <!-- LOADING AREA START ===== -->
    <div class="loading-area">
        <div class="loading-box"></div>
        <div class="loading-pic">
            <div class="wrapper">
                <div class="cssload-loader"></div>
            </div>
        </div>
    </div>
    <!-- LOADING AREA  END ====== -->

    <div class="page-wraper">

        <!-- HEADER START -->
        <header class="site-header header-style-3 mobile-sider-drawer-menu">

            <div class="sticky-header main-bar-wraper navbar-expand-lg">
                <div class="main-bar">
                    <div class="clearfix container-fluid">

                        <div class="logo-header">
                            <div class="logo-header-inner logo-header-one">
                                <a href="/">
                                    <img src="{{ url('images/logo.png') }}" alt width="120">
                                </a>
                            </div>
                        </div>

                        <!-- NAV Toggle Button -->
                        <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button"
                            class="navbar-toggler collapsed">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar icon-bar-first"></span>
                            <span class="icon-bar icon-bar-two"></span>
                            <span class="icon-bar icon-bar-three"></span>
                        </button>

                        <!-- MAIN Vav -->
                        <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center">

                            <ul class=" nav navbar-nav">
                                <li class="has-mega-menu"><a href="/">Accueil</a></li>
                                <li class="has-child"><a href="#">A propos</a></li>
                                <li class="has-child"><a href="#:;">Services</a></li>
                                <li class="has-child"><a href="#:;">Blog</a></li>
                            </ul>

                        </div>

                        <!-- Header Right Section-->
                        <div class="extra-nav header-2-nav">
                            <div class="extra-cell"></div>
                            <div class="extra-cell">
                                <div class="header-nav-btn-section">
                                    <div class="twm-nav-btn-left">
                                        <a class="twm-nav-sign-up" href="{{ route('register.view') }}">
                                            <i data-feather="log-in"></i>
                                            S'inscrire
                                        </a>
                                    </div>

                                    <div class="twm-nav-btn-right">
                                        <a href="{{ route('login.view') }}" class="twm-nav-post-a-job">
                                            <i data-feather="user"></i>
                                            Se connecter
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- SITE Search -->
                <div id="search">
                    <span class="close"></span>
                    <form role="search" id="searchform" action="/search" method="get" class="radius-xl">
                        <input class="form-control" value name="q" type="search"
                            placeholder="Type to search" />
                        <span class="input-group-append">
                            <button type="button" class="search-btn">
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </span>
                    </form>
                </div>
            </div>

        </header>
        <!-- HEADER END -->

        <!-- CONTENT START -->
        <div class="page-content">

            <!--Banner Start-->
            <div class="pt-5 twm-home1-banner-section site-bg-gray"
                style="background-image:url( {{ url('images/main-slider/slider1/bg1.jpg') }} )"
                style=" height: 100vh;">
                <div class="justify-center row" style="postion: relative; margin-top: 100px; height: 90vh;">

                    <!--Left Section-->
                    <div class="col-xl-7 col-lg-7 offset-md- col-md-12 head-text">
                        <div class="twm-bnr-left-section">
                            <div class="twm-bnr-title-small">Nous avons plus de <span class="site-text-primary">208
                                    000 </span>emplois en direct</div>
                            <div class="twm-bnr-title-large">Trouvez <span class="site-text-primary"> l'emploi</span>
                                qui correspond à votre vie</div>
                            <div class="twm-bnr-discription">Tapez votre mot-clé, puis cliquez sur Rechercher pour
                                trouver votre emploi idéal.</div>
                        </div>
                    </div>

                    <!--right Section-->
                    <div class="col-xl-5 col-lg-5 col-md-12 twm-bnr-right-section">
                        <div class="twm-bnr-right-content">

                            <div class="twm-img-bg-circle-area">
                                <div class="twm-img-bg-circle1 rotate-center"><span></span></div>
                                <div class="twm-img-bg-circle2 rotate-center-reverse"><span></span></div>
                                <div class="twm-img-bg-circle3"><span></span></div>
                            </div>

                            <div class="twm-bnr-right-carousel">
                                <div class="owl-carousel twm-h1-bnr-carousal">
                                    <div class="item overflow-hidden">
                                        <div class="slide-img">
                                            <img src="{{ url('images/hr.png') }}"
                                                class="object-cover w100" alt="#">
                                        </div>
                                    </div>
                                    <div class="item overflow-hidden">
                                        <div class="slide-img">
                                            <div class="slide-img">
                                                <img src="{{ url('images/hr-3.png') }}"
                                                     class="object-cover w100" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <!--Samll Ring Left-->
                            <div class="twm-small-ring-l slide-top-animation"></div>
                            <div class="twm-small-ring-2 slide-top-animation"></div>

                        </div>
                    </div>

                </div>
                <div class="twm-gradient-text">
                    Jobs
                </div>
            </div>
            <!--Banner End-->

            <!-- HOW IT WORK SECTION START -->
            <div class="section-full p-t120 p-b90 site-bg-white twm-how-it-work-area">

                <div class="container">

                    <!-- TITLE START-->
                    <div class="section-head center wt-small-separator-outer">
                        <div class="wt-small-separator site-text-primary">
                            <div>Processus</div>
                        </div>
                        <h2 class="wt-title">Employé/Candidat</h2>

                    </div>
                    <!-- TITLE END-->

                    <div class="twm-how-it-work-section">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="twm-w-process-steps">
                                    <span class="twm-large-number">01</span>
                                    <div class="twm-w-pro-top bg-clr-sky">
                                        <div class="twm-media">
                                            <span><img src="{{ url('images/work-process/icon1.png') }}"
                                                    alt="icon1"></span>
                                        </div>
                                        <h4 class="twm-title">Créez<br>
                                            Un compte
                                        </h4>
                                    </div>
                                    <p>Créez votre compte rapidement et soumettez votre dossier chez Power HR</p>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="twm-w-process-steps">
                                    <span class="twm-large-number">02</span>
                                    <div class="twm-w-pro-top bg-clr-pink">
                                        <div class="twm-media">
                                            <span><img src="{{ url('images/work-process/icon2.png') }}"
                                                    alt="icon1"></span>
                                        </div>
                                        <h4 class="twm-title">Mentionnez


                                            <br>
                                            Votre Attente
                                        </h4>
                                    </div>
                                    <p>Désignez l’offre que vous cherchez, votre prétention salariale et autres </p>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="twm-w-process-steps">
                                    <span class="twm-large-number">03</span>
                                    <div class="twm-w-pro-top bg-clr-green">
                                        <div class="twm-media">
                                            <span><img src="{{ url('images/work-process/icon3.png') }}"
                                                    alt="icon1"></span>
                                        </div>
                                        <h4 class="twm-title">Soumettez


                                            <br>Votre CV
                                        </h4>
                                    </div>
                                    <p>Uploadez votre CV et mettez-le à jour au quotidien </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- HOW IT WORK SECTION END -->

            <!-- JOBS CATEGORIES SECTION START -->
            <div class="section-full p-t120 p-b90 site-bg-gray twm-job-categories-area">

                <div class="container">

                    <div class="wt-separator-two-part">
                        <div class="row wt-separator-two-part-row">
                            <div class="col-xl-5 col-lg-5 col-md-12 wt-separator-two-part-left">
                                <!-- TITLE START-->
                                <div class="section-head left wt-small-separator-outer">
                                    <div class="wt-small-separator site-text-primary">
                                        <div>Quel secteur vous intéresse ? </div>
                                    </div>
                                    <h2 class="wt-title">Nous savons trouver tout ce qu'il vous faut.</h2>
                                </div>
                                <!-- TITLE END-->
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 wt-separator-two-part-right">
                                <p>Peu importe le secteur dans lequel vous évoluez, chaque domaine de compétence est
                                    géré et plusieurs candidats y trouvent des offres. </p>
                            </div>

                        </div>
                    </div>

                    <div class="twm-job-categories-section">

                        <div class="job-categories-style1 m-b30">
                            <div class="owl-carousel job-categories-carousel owl-btn-left-bottom ">

                                <!-- COLUMNS 1 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <img src="{{ asset('images/briefcase.png') }}" />
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">9,185
                                                Offres</div>
                                            <a href="#:void(0);">Architecture</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 2 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <img src="{{ asset('images/briefcase.png') }}" />
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">3,205
                                                Offres</div>
                                            <a href="#:void(0);">Ressources humaines </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 3 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <img src="{{ asset('images/briefcase.png') }}" />
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">2,100
                                                Offres</div>
                                            <a href="#:void(0);"> Finance </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 5 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <img src="{{ asset('images/briefcase.png') }}" />
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">9,185
                                                Jobs</div>
                                            <a href="#:void(0);">Comptabilité</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 6 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <img src="{{ asset('images/briefcase.png') }}" />
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">3,205
                                                Offres</div>
                                            <a href="#:void(0);">Marketing</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 7 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <img src="{{ asset('images/briefcase.png') }}" />
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">2,100
                                                offres</div>
                                            <a href="#:void(0);"> Electricité </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 8 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <img src="{{ asset('images/briefcase.png') }}" />
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">1,500
                                                Offres</div>
                                            <a href="#:void(0);">
                                                Développement web</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 9 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <img src="{{ asset('images/briefcase.png') }}" />
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">9,185
                                                Offres</div>
                                            <a href="#:void(0);">Géologie</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 10 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-media">
                                            <i data-feather="briefcase" class="flaticon-dashboard"></i>
                                        </div>
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">3,205
                                                Offres</div>
                                            <a href="#:void(0);">Santé
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <!-- JOBS CATEGORIES SECTION END -->

            <!-- EXPLORE NEW LIFE START -->
            <div class="bg-cover section-full p-t120 p-b120 twm-explore-area "
                style="background-image: url({{ url('images/background/bg-1.jpg') }});">
                <div class="container">

                    <div class="section-content">
                        <div class="row">

                            <div class="col-lg-4 col-md-12">
                                <div class="twm-explore-media-wrap">
                                    <div class="twm-media">
                                        <img src="images/fille.png" alt>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-12">
                                <div class="twm-explore-content-outer">
                                    <div class="twm-explore-content">

                                        <div class="twm-l-line-1"></div>
                                        <div class="twm-l-line-2"></div>

                                        <div class="twm-r-circle-1"></div>
                                        <div class="twm-r-circle-2"></div>

                                        <div class="twm-title-small">Un nouveau depart </div>
                                        <div class="twm-title-large">
                                            <h2>Découvrez les meilleures offres d’emploi depuis votre ville
                                            </h2>
                                            <p>Power HR vous aide, vous accompagne à trouver l’emploi de vos rêves sans
                                                beaucoup de difficultés. Tout est facilité grâce à notre large base de
                                                données.</p>
                                        </div>
                                        <div class="twm-upload-file">
                                            <a href="{{ route('login.view') }}" class="site-button">
                                                Commencer
                                                <i data-feather="log-in"></i>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="twm-bold-circle-right"></div>
                                    <div class="twm-bold-circle-left"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- EXPLORE NEW LIFE END -->

            <!-- TOP COMPANIES START -->
            <div class="section-full p-t120 site-bg-white twm-companies-wrap">

                <!-- TITLE START-->
                <div class="section-head center wt-small-separator-outer">
                    <div class="wt-small-separator site-text-primary">
                        <div>Ceux qui nous font confiance</div>
                    </div>
                    <h2 class="wt-title">Entreprises partenaires</h2>
                </div>
                <!-- TITLE END-->

                <div class="container">
                    <div class="section-content">
                        <div class="owl-carousel home-client-carousel2 owl-btn-vertical-center">
                            @forelse($partenaires as $partenaire)
                            <div class="item">
                                <div class="ow-client-logo">
                                    <div class="client-logo client-logo-media">
                                        <a href="#!">
                                            <img src="{{ url('storage/' . $partenaire->logo) }}" alt>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w1.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w2.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w3.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w4.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w5.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w6.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w1.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w2.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w3.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ow-client-logo">
                                        <div class="client-logo client-logo-media">
                                            <a href="#!"><img
                                                    src="{{ url('images/client-logo/w5.png') }}" alt></a>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="twm-company-approch-outer">
                    <div class="twm-company-approch">
                        <div class="row">

                            <!--block 1-->
                            <div class="col-lg-4 col-md-12">
                                <div class="counter-outer-two">
                                    <div class="icon-content">
                                        <div class="tw-count-number text-clr-sky">
                                            <span class="counter">3</span>K+
                                        </div>
                                        <p class="icon-content-info">Utilisateurs actifs</p>
                                    </div>
                                </div>
                            </div>

                            <!--block 2-->
                            <div class="col-lg-4 col-md-12">
                                <div class="counter-outer-two">
                                    <div class="icon-content">
                                        <div class="tw-count-number text-clr-pink">
                                            <span class="counter">9</span>K+
                                        </div>
                                        <p class="icon-content-info">Offres disponibles</p>
                                    </div>
                                </div>
                            </div>

                            <!--block 3-->
                            <div class="col-lg-4 col-md-12">
                                <div class="counter-outer-two">
                                    <div class="icon-content">
                                        <div class="tw-count-number text-clr-green">
                                            <span class="counter">4</span>K+
                                        </div>
                                        <p class="icon-content-info">Entreprises</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- TOP COMPANIES END -->

            <!-- Services -->
            <div class="section-full p-t120 p-b90 site-bg-gray twm-job-categories-area">

                <div class="container">

                    <div class="wt-separator-two-part">
                        <div class="row wt-separator-two-part-row">
                            <div class="col-xl-12 col-lg-12 col-md-12 wt-separator-two-part-left">
                                <!-- TITLE START-->
                                <div class="section-head left wt-small-separator-outer">
                                    <div class="wt-small-separator site-text-primary">
                                        <div>Nos services </div>
                                    </div>
                                    <h2 class="wt-title">Services</h2>
                                </div>
                                <!-- TITLE END-->
                            </div>
                        </div>
                    </div>

                    <div class="twm-job-categories-section">

                        <div class="job-categories-style1 m-b30">
                            <div class="owl-carousel twm-la-home-blog owl-btn-left-bottom ">

                                <!-- COLUMNS 1 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">DEMANDE DE COTATION ET SOURCING</div>
                                            <a href="#:void(0);">Demande de cotations, sourcing (étude des besoins du
                                                client, recherche et évaluation des candidatures, sélection des
                                                talents, négociation du contrat, rapport global)</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 1 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">OUTSOURCING : RECRUTEMENT, ONBOARDING</div>
                                            <a href="#:void(0);">
                                                Signature du contrat de travail, immatriculations CNSS, visa contrats
                                                ONEM, cartes de services, ouverture des
                                                comptes
                                                bancaires, visites d’embauche</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 1 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">GESTION DES CONTRATS, GESTION DE LA PAIE
                                            </div>
                                            <a href="#:void(0);">
                                                Timesheets, payroll, bulletins de salaire, le paiement des salaires, le
                                                paiement des charges salariales (charges
                                                sociales et fiscales sur salaires)</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 1 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">GESTION DES CONTRATS, GESTION DE LA PAIE
                                            </div>
                                            <a href="#:void(0);">
                                                Timesheets, payroll, bulletins de salaire, le paiement des salaires, le
                                                paiement des charges salariales (charges
                                                sociales et fiscales sur salaires)</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 1 -->
                                <div class="item ">
                                    <div class="job-categories-block">
                                        <div class="twm-content">
                                            <div class="twm-jobs-available">FORMATIONS, BILAN DE COMPÉTENCES</div>
                                            <a href="#:void(0);">Plan de formation, cartographie de risques, création
                                                d’entreprise, conseils financiers et
                                                fiscal</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Service -->

            <!-- OUR BLOG START -->
            <div class="section-full p-t120 p-b90 site-bg-gray">
                <div class="container">

                    <!-- TITLE START-->
                    <div class="section-head center wt-small-separator-outer">
                        <div class="wt-small-separator site-text-primary">
                            <div>Blog</div>
                        </div>
                        <h2 class="wt-title">Dernières Offres</h2>

                    </div>
                    <!-- TITLE END-->

                    <div class="section-content">
                        <div class="twm-blog-post-1-outer-wrap">
                            <div class="owl-carousel twm-la-home-blog owl-btn-bottom-center">
                                @forelse($offers as $offer)
                                    <div class="item">
                                        <!--Block one-->
                                        <div class="blog-post twm-blog-post-1-outer border">
                                            <div class="wt-post-info">
                                                <div class="wt-post-meta ">
                                                    <ul>
                                                        <li class="post-date">
                                                            {{ $offer->created_at->locale('fr')->translatedFormat('d F, Y') }}
                                                        </li>
                                                        <li class="post-author">Par
                                                            <a href="#">{{ ucfirst($offer->client?->company?->name ?? 'PowerHR') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wt-post-title ">
                                                    <h4 class="post-title">
                                                        <a href="#">
                                                            {{ strlen($offer->title) > 30 ? substr($offer->title, 0, 30) . '...' : $offer->title }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="wt-post-text ">
                                                    <p>
                                                        {{ strlen($offer->description) > 50 ? substr($offer->description, 0, 50) . '...' : $offer->description }}
                                                    </p>
                                                </div>
                                                <div class="wt-post-readmore ">
                                                    <a href="{{ route('candidate.jobs.show', $offer) }}" class="site-button-link site-text-primary">Voir détail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted text-center">
                                        Aucune offre publié !
                                    </p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- OUR BLOG END -->

        </div>
        <!-- CONTENT END -->

        <!-- FOOTER START -->
        <footer class="footer-dark" style="background-image: url({{ url('images/f-bg.jpg') }});">
            <div class="container">

                <!-- FOOTER BLOCKES START -->
                <div class="footer-top">
                    <div class="row">

                        <div class="col-lg-4 col-md-12">
                            <div class="widget widget_about">
                                <div class="clearfix logo-footer">
                                    <a href="/"><img src="images/logo.png" alt></a>
                                </div>
                                <p>Power HR est une entreprise axée sur les ressources humaines qui permet aux
                                    entreprises de trouver très facilement les meilleurs profils et aux demandeurs
                                    d’emploi de trouver une société qui correspond à leur vision afin de mener à bien
                                    leur carrière</p>

                            </div>

                        </div>

                        <div class="col-lg-8 col-md-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="widget widget_services ftr-list-center">
                                        <h3 class="widget-title">Contact</h3>
                                        <ul>
                                            <li><a href="#"> +243 8222 144 160</a></li>
                                            <li><a href="#">contact@powerhr.com</a></li>
                                            <li><a href="#"> Isoke 152,</br> Gombe, Kinshasa</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="widget widget_services ftr-list-center">
                                        <h3 class="widget-title">Liens rapides</h3>
                                        <ul>
                                            <li><a href="/">Accueil</a></li>
                                            <li><a href="#">A propos</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>


                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- FOOTER COPYRIGHT -->
                <div class="footer-bottom">

                    <div class="footer-bottom-info">

                        <div class="footer-copy-right">
                            <span class="copyrights-text">Copyright
                                © 2024 Power HR DRC
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </footer>
        <!-- FOOTER END -->

        <!-- BUTTON TOP START -->
        <button class="scroltop">
            <span class="relative fa fa-angle-up" id="btn-vibrate"></span>
        </button>

    </div>

    <!-- JAVASCRIPT  FILES ========================================= -->
    <script src="{{ url('js/jquery-3.6.0.min.js') }}"></script><!-- JQUERY.MIN JS -->
    <script src="{{ url('js/popper.min.js') }}"></script><!-- POPPER.MIN JS -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="{{ url('js/magnific-popup.min.js') }}"></script><!-- MAGNIFIC-POPUP JS -->
    <script src="{{ url('js/waypoints.min.js') }}"></script><!-- WAYPOINTS JS -->
    <script src="{{ url('js/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
    <script src="{{ url('js/waypoints-sticky.min.js') }}"></script><!-- STICKY HEADER -->
    <script src="{{ url('js/isotope.pkgd.min.js') }}"></script><!-- MASONRY  -->
    <script src="{{ url('js/imagesloaded.pkgd.min.js') }}"></script><!-- MASONRY  -->
    <script src="{{ url('js/owl.carousel.min.js') }}"></script><!-- OWL  SLIDER  -->
    <script src="{{ url('js/theia-sticky-sidebar.js') }}"></script><!-- STICKY SIDEBAR  -->
    <script src="{{ url('js/lc_lightbox.lite.js') }}"></script><!-- IMAGE POPUP -->
    <script src="{{ url('js/bootstrap-select.min.js') }}"></script><!-- Form js -->
    <script src="{{ url('js/dropzone.js') }}"></script><!-- IMAGE UPLOAD  -->
    <script src="{{ url('js/jquery.scrollbar.j') }}s"></script><!-- scroller -->
    <script src="{{ url('js/bootstrap-datepicker.js') }}"></script><!-- scroller -->
    <script src="{{ url('js/jquery.dataTables.min.js') }}"></script><!-- Datatable -->
    <script src="{{ url('js/dataTables.bootstrap5.min.js') }}"></script><!-- Datatable -->
    <script src="{{ url('js/chart.js') }}"></script><!-- Chart -->
    <script src="{{ url('js/bootstrap-slider.min.js') }}"></script><!-- Price range slider -->
    <script src="{{ url('js/swiper-bundle.min.js') }}"></script><!-- Swiper JS -->
    <script src="{{ url('js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->

    <script>
        feather.replace();
    </script>

</body>

</html>
