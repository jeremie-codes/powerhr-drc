@extends('base')

@section('title', 'Accueil')

@section('body')

@php
    $locale = app()->getLocale();
@endphp
<!-- ============================ Hero Banner  Start================================== -->
<div class="hero-header full-height home-5 position-relative" data-overlay="0"
    style="background-image: url({{ asset('images/banner-2.png') }}); background-size: cover;">
    <div class="container">

        <div class="row justify-content-between align-items-center g-4">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">

                <div class="mb-5 position-relative fst-italic">
                    <h3 style="font-weight: 400">NOUS TRANSFORMONS</h3>
                    <h1 class="my-0" style="text-transform: uppercase">L'EXPéRIENCE <span class="text-seegreen text-warning">HR</span> EN RDC</h1>
                    <p class="banner-subtitle fw-light btn btn-dark">Identities fit, <span class="text-seegreen text-warning fst-italic fw-semibold"> HR Legacy</span></p>
                    <p class="text-right position-relative banner-subtitle fw-normal col-12 col-md-6">Construisons ensemble
                        <span class="text-seegreen text-warning fst-italic"> l'héritage HR de demain</span> <br>
                        <img src="{{ asset('images/courbe.png') }}" class="img-fluid" width="100" alt="Image" style="position: absolute; right: 20px; top: 20px">
                    </p>
                </div>

                <!-- Search Form -->
                <div class="shadow smartSearch col-md-8">
                    <div class="row g-0">

                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                            <div class="form-search withIcon start">
                                <input type="text" class="form-control" placeholder="Intitulé de l'offre ou mot-clé...">
                                <span class="icons"><i class="bi bi-search"></i></span>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <div class="form-search btn-box">
                                <button type="button" class="btn btn-primary">Recherche</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-5 d-block position-relative">
                    <div class="flex-wrap gap-3 d-flex align-items-center justify-content-start">
                        <div class="singleGroup">
                            <div class="gap-2 d-flex align-items-center justify-content-start">
                                <div class="bg-white square--40 circle"><img src="{{ asset('assets-2/img/trustpilot.png') }}" class="img-fluid" width="20" alt="Image"></div>
                                <div class="text-white fw-4 fw-bold">Avis de </div>
                            </div>
                        </div>
                        <div class="singleGroup">
                            <div class="gap-2 d-flex align-items-center justify-content-start">
                                <div class="gap-1 d-flex align-items-center justify-content-start">
                                    <i class="text-sm fa-solid fa-star text-warning"></i>
                                    <i class="text-sm fa-solid fa-star text-warning"></i>
                                    <i class="text-sm fa-solid fa-star text-warning"></i>
                                    <i class="text-sm fa-solid fa-star text-warning"></i>
                                    <i class="text-sm fa-solid fa-star text-warning"></i>
                                </div>
                                <span class="text-white fw-bold">4.8/5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 z-2">
                <div class="banner-clousio">
                    <div class="position-relative">
                        <div class="m-0 text-center figure"><img src="{{ asset('images/follow.png') }}" class="img-fluid" width="150" style="position: absolute; right: 0; bottom: -70px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </row> -->

    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->


<!-- ============================== User Options Start ======================================= -->
<section>
    <div class="container">
        <div class="row g-4">

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="py-4 border calculamBox">
                    <div class="flex-wrap gap-2 d-flex align-items-center justify-content-between">

                        <div class="boxCaps">
                            <div class="mb-3 capsWrap">
                                <h4>Pour les employeurs</h4>
                                <p>Trouvez des professionnels du monde entier et possédant toutes les compétences.</p>
                            </div>
                            <div class="d-block btnWrap">
                                <a href="{{ route('client.jobs.create', ['locale' => $locale]) }}" class="btn btn-light-primary rounded-pill"><i class="bi bi-send-check me-2"></i>Publiez votre offre - Gratuitement</a>
                            </div>
                        </div>

                        <div class="imageThumb">
                            <img src="{{ asset('images/publish.png') }}" class="img-fluid" alt="Img" style="height: 230px !important;">
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Col -->

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="py-4 border calculamBox">
                    <div class="flex-wrap gap-2 d-flex align-items-center justify-content-between">

                        <div class="boxCaps">
                            <div class="mb-3 capsWrap">
                                <h4>Pour les candidats</h4>
                                <p>Développez votre profil professionnel, trouvez de nouvelles opportunités d'emploi.</p>
                            </div>
                            <div class="d-block btnWrap">
                                <a href="{{ route('candidate.cv.index', ['locale' => $locale]) }}" class="btn btn-light-primary rounded-pill"><i class="bi bi-cloud-arrow-up me-2"></i>Publiez votre CV</a>
                            </div>
                        </div>

                        <div class="imageThumb">
                            <img src="{{ asset('images/send-cv.png') }}" class="img-fluid" alt="Img" style="height: 230px !important;">
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Col -->

        </div>
        <!-- End Row -->
    </div>
</section>
<!-- ============================== User Options End ======================================= -->


<!-- ============================ Job category Start ================================== -->
<section>
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                <div class="moder-heading">
                    <div class="subtitleHeading-wrap">
                        <h6 class="subtitle-heading">Catégories</h6>
                    </div>
                    <h2 class="main-heading">Explorer les catégories</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center g-4">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Marketing & Sale' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <div class="category-content">
                        <h6>Marketing & Sale</h6>
                        <p>170 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Finance' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-currency-exchange"></i>
                    </div>
                    <div class="category-content">
                        <h6>Finance</h6>
                        <p>112 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Human Resource' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-file-earmark-medical"></i>
                    </div>
                    <div class="category-content">
                        <h6>Human Resource</h6>
                        <p>110 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Customer Service' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="category-content">
                        <h6>Customer Service</h6>
                        <p>170 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Management' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-cup-hot"></i>
                    </div>
                    <div class="category-content">
                        <h6>Management</h6>
                        <p>132 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Software' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-display"></i>
                    </div>
                    <div class="category-content">
                        <h6>Software</h6>
                        <p>180 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Retail & Products' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-basket2"></i>
                    </div>
                    <div class="category-content">
                        <h6>Retail & Products</h6>
                        <p>142 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Security Analyst' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="category-content">
                        <h6>Security Analyst</h6>
                        <p>210 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Market Research' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-lamp-fill"></i>
                    </div>
                    <div class="category-content">
                        <h6>Market Research</h6>
                        <p>162 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Art & Design' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-easel2"></i>
                    </div>
                    <div class="category-content">
                        <h6>Art & Design</h6>
                        <p>186 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Education' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="category-content">
                        <h6>Education</h6>
                        <p>113 Jobs Available</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href='{{ url("$locale/jobs?category=") }}Automobile' class="category-item">
                    <div class="category-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div class="category-content">
                        <h6>Automobile</h6>
                        <p>162 Jobs Available</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Job category End ================================== -->


<!-- ============================ Trending Jobs Start ================================== -->
<section class="bg-light">
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <div class="smart-heading-wrap">
                    <div class="smart-heading">
                        <h2 class="main-heading">Offres d'emploi tendance pour vous</h2>
                        <div class="subtitleHeading-wrap">
                            <h6 class="subtitle-heading">Découvrez plein d'offres d'emploi actives sur PowerHr</h6>
                        </div>
                    </div>
                    <div class="explore-wrap">
                        <a href="{{ route('jobs', ['locale' => $locale]) }}" class="btn-simple-link">Voir toutes les offres</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row align-items-center justify-content-center g-4">

           @forelse ($jobs as $job)
            <!-- Single Item -->
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                <div class="joblist-layouts JobhillShdaow">
                    <div class="joblist-body">
                        <div class="joblist-wrapper">

                            <div class="joblist-first">
                                <div class="starterCaption">
                                    <div class="jobAvatar">
                                        <a class="text-center border bg-light rounded-2 avatar" href="#">
                                            <i class="bi bi-briefcase text-primary" style="font-size: 30px;"></i>
                                        </a>
                                    </div>
                                    <div class="starterInfo">
                                        <div class="starterInfo-body">
                                            <div class="titleWraps">
                                                <h5 class="title verified"><a href="#">{{ $job->title }}<span class="verify" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Verified Jobs"><i class="bi bi-patch-check-fill"></i></span></a></h5>
                                                <div class="infoGroup">
                                                    <span class="infoText jobtype">{{ strlen($job->category?->name) > 30 ? substr($job->category?->name, 0, 30) . '...' : $job->category?->name }}</span>
                                                    <span class="infoText location"><i class="bi bi-geo-alt me-1"></i>{{ $job->location ?? '--' }}</span>
                                                    <span class="infoText jobtype">{{ $job->contract_type }}</span>
                                                    <span class="infoText exp"><i class="bi bi-briefcase me-1"></i>{{ $job->experience_years ? $job->experience_years . ' an(s)': '' }}, Expérience</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="starterInfo-bottom">
                                            <div class="mb-4 jobDesc d-block">
                                                <p class="m-0">{{ strlen($job->description) > 50 ? substr($job->description, 0, 50) . '...' : $job->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <a href="#" class="JobhillLink"></a>
                </div>
            </div>
           @empty
           <!-- Single Item -->
          <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
              <div class="joblist-layouts JobhillShdaow">
                  <div class="joblist-body">
                        <div class="joblist-wrapper">
                            <p class="text-center col-12">Aucune offre disponible</p>
                        </div>
                  </div>
              </div>
          </div>
           @endforelse

        </div>

    </div>
</section>
<!-- ============================ Trending Jobs End ================================== -->


<!-- =============================== Your Career Grows =============================== -->
<section class="py-0 bg-primary position-relative">
    <div class="container">

        <div class="row align-items-center justify-content-between g-4">

            <div class="col-xl-5 col-lg-6 col-md-12">
                <div class="py-5 servicesTags my-lg-5">

                    <div class="mb-4 headingBloc d-block">
                        <h3 class="fw-semibold text-light">Nos services pour faire progresser votre carrière</h3>
                    </div>

                    <div class="my-5 JobhillFeatures">
                        <div class="single">
                            <div class="icons withShadow lice">
                                <i class="text-white bi bi-pencil-square"></i>
                            </div>
                            <div class="caption">
                                <h5 class="capTitle text-light">Inscrivez-vous gratuitement</h5>
                                <div class="opacity-75 description text-light">Demander au client de ne pas prêter attention est logique dès le départ, car cela limitera les choses.</div>
                            </div>
                        </div>
                        <div class="single">
                            <div class="icons withShadow lice">
                                <i class="text-white bi bi-pin-angle"></i>
                            </div>
                            <div class="caption">
                                <h5 class="capTitle text-light">Recrutez et publiez les meilleurs talents</h5>
                                <div class="opacity-75 description text-light">C'est un fait établi depuis longtemps : une part de pizza que vous avez oublié d'acheter.</div>
                            </div>
                        </div>
                        <div class="single">
                            <div class="icons withShadow lice">
                                <i class="text-white bi bi-stars"></i>
                            </div>
                            <div class="caption">
                                <h5 class="capTitle text-light">Travaillez avec les meilleurs sans vous casser la figure.</h5>
                                <div class="opacity-75 description text-light">Généralement, nous préférons l'original, le vin sans conservateurs à base de soufre.</div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-3 d-flex align-items-center justify-content-start">
                        <a href="#" class="px-5 btn btn-warning rounded-pill fw-medium">Créer un compte</a>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <div class="top-0 bottom-0 bg-cover h-100 position-absolute end-0 w-50 d-none d-md-none d-xl-block d-lg-block" style="background:url(assets-2/img/base-2.jpg)no-repeat;"></div>
    {{-- <div class="top-0 bottom-0 bg-cover h-100 position-absolute end-0 w-50 d-none d-md-none d-xl-block d-lg-block" style="background:url(images/section.png)no-repeat;"></div> --}}
</section>
<!-- ============================== Your Career Grows End ========================== -->


<!-- ============================ Hiring Companies Start ================================== -->
<section class="border-bottom">
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <div class="smart-heading-wrap">
                    <div class="smart-heading">
                        <h2 class="main-heading">Entreprises - partenaires</h2>
                        <div class="subtitleHeading-wrap">
                            <h6 class="subtitle-heading">Trouvez des entreprises qui cherchent des talents</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="companies_slider">

                    @forelse($partenaires as $partenaire)
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ url('storage/' . $partenaire->logo) }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">{{ $partenaire->name }}</a></h4>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ asset('assets-2/img/emp-3.png') }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">Flying Software Consultency</a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ asset('assets-2/img/emp-1.png') }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">Amook Software Services</a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ asset('assets-2/img/emp-5.png') }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">Addok Adsword Services</a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ asset('assets-2/img/emp-6.png') }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">Slaps eMail Services</a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ asset('assets-2/img/emp-7.png') }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">Moco Consultancy Services</a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ asset('assets-2/img/emp-1.png') }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">Tata Consultancy Services</a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ asset('assets-2/img/emp-9.png') }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">Yelp Advertisement Services</a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="p-0 pt-2 companiesGrid JobhillShdaow">
                            <div class="imageWrap">
                                <img src="{{ asset('assets-2/img/emp-10.png') }}" class="img-fluid" alt="Company Logo">
                            </div>
                            <div class="companyDetails">
                                <h4 class="companyTitle"><a class="name" href="#">Croom Email Marketing</a></h4>
                            </div>
                        </div>
                    </div>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Hiring Companies End ================================== -->


<!-- ============================ Explore Job By Location Start ================================== -->
<section>
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                <div class="moder-heading">
                    <div class="subtitleHeading-wrap">
                        <h6 class="subtitle-heading">Publications récentes</h6>
                    </div>
                    <h2 class="main-heading">Nos derniers postes</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="location_slider">

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-16.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-1.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-6.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-3.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-2.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-4.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-5.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-7.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-8.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-9.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-10.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-12.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-13.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-14.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-15.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-18.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-19.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-20.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-21.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- ============================ Explore Job By Location End ================================== -->


<!-- ============================ Users Reviews Start ================================== -->
<section class="bg-light">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="smart-heading-wrap">
                    <div class="smart-heading">
                        <h2 class="main-heading">La confiance de nos clients et partenaires</h2>
                        <div class="subtitleHeading-wrap">
                            <h6 class="subtitle-heading">Meilleurs avis de nos clients</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <div class="reviews_slider">

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">Absolutely love Jobhill! whenever I'm in need of finding a job, POWER HR DRC is my #1 go to! wouldn't look anywhere else.</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">I love this app, and service, it makes applying for job so much easier you can make your resume as easy as filling out an application...</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">POWER HR DRC the best job finder app out there right now.. they also protect you from spammers so the only emails I get due to...</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">I love this POWER HR DRC app. it's more legit than the other ones with advertisement. Once I uploaded my resume, then employers...</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">Overall, the POWER HR DRC application is a powerful tool for anyone in the job market. Its reliability, extensive job listings, and user-friendly..</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
<!-- ============================ Users Reviews End ================================== -->


<!-- ============================ Trending Searches Start ================================== -->
<section>
    <div class="container">

        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="smart-heading-wrap">
                    <div class="smart-heading">
                        <h2 class="main-heading">Découvrez les emplois les plus populaires</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center g-4">
            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="discoverTabs">
                    <nav class="scrollwrap">
                        <div class="nav nav-tabs simple-tabs borders" id="nav-tab" role="tablist">

                            <button class="nav-link active" id="nav-popular-tab" data-bs-toggle="tab" data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular" aria-selected="true">Recherche Populaire</button>

                            <button class="nav-link" id="nav-location-tab" data-bs-toggle="tab" data-bs-target="#nav-location" type="button" role="tab" aria-controls="nav-location" aria-selected="false">Lieux</button>

                            <button class="nav-link" id="nav-jobtype-tab" data-bs-toggle="tab" data-bs-target="#nav-jobtype" type="button" role="tab" aria-controls="nav-jobtype" aria-selected="false">Type d'emploi</button>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <!-- Popular Searches -->
                        <div class="tab-pane fade show active" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab" tabindex="0">
                            <div class="trendinglinks-wrap">
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>gestionnaire administratif</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>concepteur graphique</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>senior web designer</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>femme au foyer</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>développeur web</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>Agent immobilier</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>marketing des ventes</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>superviseur</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>développeur Figma vers WordPress</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>Concepteur HTML</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>Chauffeur</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>Boulanger</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>Chef de projet</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>spécialiste SEO</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>rédacteur de contenu</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>chef administratif</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>ressources humaines</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>chef cuisinier</a>
                            </div>
                        </div>

                        <!-- Locations -->
                        <div class="tab-pane fade" id="nav-location" role="tabpanel" aria-labelledby="nav-location-tab" tabindex="0">
                            <div class="trendinglinks-wrap">
                                <a href="#" class="trending-link"><i class="bi bi-geo-alt me-2"></i>Kinshasa</a>
                                <a href="#" class="trending-link"><i class="bi bi-geo-alt me-2"></i>Lubambashi</a>
                                <a href="#" class="trending-link"><i class="bi bi-geo-alt me-2"></i>Kongo central</a>
                                <a href="#" class="trending-link"><i class="bi bi-geo-alt me-2"></i>Mbuji-Mayi</a>
                                <a href="#" class="trending-link"><i class="bi bi-geo-alt me-2"></i>Ituri</a>
                                <a href="#" class="trending-link"><i class="bi bi-geo-alt me-2"></i>Équateur</a>
                                <a href="#" class="trending-link"><i class="bi bi-geo-alt me-2"></i>Autres</a>
                            </div>
                        </div>

                        <!-- Job Types -->
                        <div class="tab-pane fade" id="nav-jobtype" role="tabpanel" aria-labelledby="nav-jobtype-tab" tabindex="0">
                            <div class="trendinglinks-wrap">
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>A Temps plein</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>Occasionnel/Temporaire</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>Temps Partiel</a>
                                <a href="#" class="trending-link"><i class="bi bi-search me-2"></i>Stage</a>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>


    </div>
</section>
<!-- ============================ Trending Searches End ================================== -->
@endsection
