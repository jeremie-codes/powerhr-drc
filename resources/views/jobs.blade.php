@extends('base')

@section('title', 'Accueil')

@section('body')

<!-- ============================ Page Title ================================== -->
<section class="bg-cover position-relative" style="background:url({{ asset('assets-2/img/about.png') }})no-repeat;" data-overlay="5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-7 col-lg-9 col-md-12">

                <div class="my-4 text-center fpc-capstion">
                    <div class="fpc-captions">
                        <h2 class="text-white fw-medium">Explorez <span class="text-warning">toutes les offres d'emploie</span> disponibles</h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title ================================== -->


<!-- ============================ Search Job Wrapper ================================== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-start justify-content-between g-4">

            <!-- Search Sidebar -->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="searchingSidebar pe-xl-5 pe-lg-4">

                    <div class="border offcanvas offcanvas-start rounded-3 largeshow" data-bs-scroll="true" tabindex="-1" id="filterSlider" aria-labelledby="filterSliderLabel">
                        <div class="py-3 offcanvas-header border-bottom">
                            <h3 class="h5">Filters</h3>
                            <button type="button" class="text-sm btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#filterSidebar" aria-label="Close"></button>
                        </div>

                        <div class="p-4 offcanvas-body" id="filterSliderLabel">

                            <!-- Jobs Options -->
                            <div class="searchInner">

                                <div class="search-inner">

                                    <!-- Job Keyword -->
                                    <div class="widget">
                                        <h5 class="widgetTitle">Mot-clé d'emploi</h5>
                                        <div class="formField icons">
                                            <input type="text" class="form-control lights" placeholder="Job title, keywords...">
                                            <i class="fa fa-search icon"></i>
                                        </div>
                                    </div>

                                    <!-- Locations -->
                                    <div class="widget">
                                        <h5 class="widgetTitle">Lieux</h5>
                                        <div class="formField lights icons">
                                            <select class="jobcategory form-control">
                                                <option label="option"></option>
                                                <option value="all">Tout le pays</option>
                                                <option value="bank">Congo Kinshasa</option>
                                                <option value="auto">Congo Brazzaville</option>
                                            </select>
                                            <i class="fa-solid fa-location-dot icon"></i>
                                        </div>
                                    </div>

                                    <!-- Category -->
                                    <div class="widget">
                                        <h5 class="widgetTitle">Catégorie</h5>
                                        <div class="formField lights">
                                            <select class="jobcategory form-control">
                                                <option label="option"></option>
                                                <option value="all">All Categories</option>
                                                <option value="bank">Bank & Accounting</option>
                                                <option value="auto">Automotive Jobs</option>
                                                <option value="edu">Education & Training</option>
                                                <option value="it">IT & Software</option>
                                                <option value="health">Healthcare</option>
                                                <option value="mrk">Marketing</option>
                                                <option value="inter">Internet Services</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Job Type -->
                                    <div class="widget">
                                        <h5 class="widgetTitle">Type d'emploi</h5>
                                        <div class="formField">
                                            <div class="row align-items-center justify-content-between gy-2">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="fulltime">
                                                        <label class="form-check-label" for="fulltime">A Temps plein</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="parttime">
                                                        <label class="form-check-label" for="parttime">Occasionnel</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="internship">
                                                        <label class="form-check-label" for="internship">Temps partiel</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="contract">
                                                        <label class="form-check-label" for="contract">Stage</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Experience -->
                                    <div class="widget">
                                        <h5 class="widgetTitle">Expérience</h5>
                                        <div class="formField">
                                            <div class="row align-items-center justify-content-between gy-2">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="freshgraduate">
                                                        <label class="form-check-label" for="freshgraduate">Jeune iplomé</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="beginner">
                                                        <label class="form-check-label" for="beginner">Gradué</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="intermediate">
                                                        <label class="form-check-label" for="intermediate">Lincecié</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="expert">
                                                        <label class="form-check-label" for="expert">Expert</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-0 form-group filter_button">
                                        <button type="submit" class="btn btn-primary fw-medium full-width">Rechercher L'emploi</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- Sidebar End -->

            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">

                <div class="mb-4 row align-items-start">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="showingOption">

                            <div class="showingResults">
                                <div class="showTitle">Resultats:<span class="totalResults">{{ $jobs->count() }}</span></div>
                            </div>

                            <div class="resultShorting">
                                <select class="shorting">
                                    <option value="ry">Recently</option>
                                    <option value="nw">Newest</option>
                                    <option value="ol">Oldest</option>
                                    <option value="ft" selected>Featured</option>
                                    <option value="tr">Trending</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- All Job Liats -->
                <div class="mb-5 row justify-content-center g-4">

                    @forelse ($jobs as $job)
                        <!-- Single Item -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="border jobListwrap card JobhillShdaow">

                                <div class="card-body">
                                    <div class="mb-2 jobListheader">
                                        <div class="flex-wrap gap-2 d-flex align-items-start justify-content-between">
                                            <div class="jobTitle flex-fill">
                                                <div class="flex-wrap gap-3 d-flex align-items-start justify-content-start">
                                                    <div class="thumbs">
                                                        <figure class="m-0 bg-secondary rounded-2">
                                                            <img src="{{ asset('images/favicon.png') }}" class="img-fluid avatar avatar-lg rounded-0" alt="">
                                                        </figure>
                                                    </div>

                                                    <div class="flex-fill capsio">
                                                        <h5 class="mb-1 jobTitlename"><a href="#">{{ $job->title }}</a> <i class="bi bi-patch-check-fill text-success"></i></h5>
                                                        <div class="jobTopinfo">
                                                            <div class="gap-2 d-flex align-items-center justify-content-start">
                                                                <a href="#" class="text-md text-muted fw-medium">{{ $job->category?->name ?? '--' }}</a>
                                                                <span class="seperate fw-bold">.</span>
                                                                <a href="#" class="text-md text-seegreen fw-medium">{{ $job->location ?? '--' }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="saveJob">
                                                <a href="#" class="Smallbtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Voir plus"><i class="fa fa-eye"></i></a>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-2 jobListmiddle">
                                        <div class="mb-4 jobDesc d-block">
                                            <p class="m-0">{{ strlen($job->description) > 150 ? substr($job->description, 0, 150) . '...' : $job->description }}</p>
                                        </div>
                                        <div class="flex-wrap gap-3 d-flex align-items-start justify-content-start">
                                            <span class="badge badge-md badge-secondary">Expérience:{{ $job->experience_years ? $job->experience_years . ' an(s)': '' }}</span>
                                            <span class="badge badge-md badge-secondary">Type de contrat: {{ $job->contract_type }}</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="JobhillLink"></a>
                            </div>
                        </div>
                    @empty
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="border jobListwrap card JobhillShdaow">
                                <div class="card-body"></div>
                                    <div class="mb-2 jobListheader">
                                        <div class="flex-wrap gap-2 d-flex align-items-start justify-content-between">
                                            <div class="jobTitle flex-fill">
                                                <div class="flex-wrap gap-3 d-flex align-items-start justify-content-start">
                                                    <div class="px-5 flex-fill capsio">
                                                        <h5 class="mb-1 jobTitlename"><a href="#">Aucun offre disponible</a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>

                <!-- Pagination Start -->
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link"><i class="fa-solid fa-arrow-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fa-solid fa-arrow-right"></i></a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Pagination END -->

            </div>

        </div>
    </div>
</section>
<!-- ============================ Search Job Wrapper End ================================== -->
@endsection
