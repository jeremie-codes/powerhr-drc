@extends('base')

@section('title', 'Accueil')

@section('body')

    <!-- ============================ Page Title ================================== -->
    <section class="bg-cover position-relative" style="background:url({{ asset('assets-2/img/about.png') }})no-repeat;"
        data-overlay="5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-12">

                    <div class="my-4 text-center fpc-capstion">
                        <div class="fpc-captions">
                            <h2 class="text-white fw-medium">Explorez <span class="text-warning">toutes les offres
                                    d'emploi</span> disponibles</h2>
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

                        <div class="border offcanvas offcanvas-start rounded-3 largeshow" data-bs-scroll="true"
                            tabindex="-1" id="filterSlider" aria-labelledby="filterSliderLabel">
                            <div class="py-3 offcanvas-header border-bottom">
                                <h3 class="h5">Filters</h3>
                                <button type="button" class="text-sm btn-close d-lg-none" data-bs-dismiss="offcanvas"
                                    data-bs-target="#filterSidebar" aria-label="Close"></button>
                            </div>

                            <div class="p-4 offcanvas-body" id="filterSliderLabel">

                                <!-- Jobs Options -->
                                <div class="searchInner">

                                    <div class="search-inner">
                                        <form action="{{ route('jobs') }}" method="GET">

                                            <!-- Mot-clé -->
                                            <div class="widget">
                                                <h5 class="widgetTitle">Mot-clé d'emploi</h5>

                                                <div class="formField icons">
                                                    <input type="text" name="search" class="form-control lights"
                                                        placeholder="Job title, keywords..."
                                                        value="{{ request('search') }}">

                                                    <i class="fa fa-search icon"></i>
                                                </div>
                                            </div>

                                            <!-- Catégorie -->
                                            <div class="widget">
                                                <h5 class="widgetTitle">Catégorie</h5>

                                                <div class="formField lights">
                                                    <select name="category" class="jobcategory form-control">

                                                        <option value="">Toutes les catégories</option>

                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach

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
                                                                <input class="form-check-input" {{ request('contract_type') == 'Temps plein' ? 'checked': '' }} value="Temps plein" name="contract_type" type="radio" id="full_time">
                                                                <label class="form-check-label" for="full_time">A Temps plein</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" {{ request('contract_type') == 'Temps partiel' ? 'checked': '' }} value="Temps partiel" name="contract_type" type="radio" id="part_time">
                                                                <label class="form-check-label" for="part_time">Temps partiel</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" {{ request('contract_type') == 'Apprentissage' ? 'checked': '' }} value="Apprentissage" name="contract_type" type="radio" id="apprentissage">
                                                                <label class="form-check-label" for="apprentissage">Apprentissage</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" {{ request('contract_type') == 'Stage' ? 'checked': '' }} value="Stage" name="contract_type" type="radio" id="stage">
                                                                <label class="form-check-label" for="stage">Stage</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" {{ request('contract_type') == 'CDI' ? 'checked': '' }} value="CDI" name="contract_type" type="radio" id="cdi">
                                                                <label class="form-check-label" for="cdi">CDI</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" {{ request('contract_type') == 'CDD' ? 'checked': '' }} value="CDD" name="contract_type" type="radio" id="cdd">
                                                                <label class="form-check-label" for="cdd">CDD</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" {{ request('contract_type') == 'Autre' ? 'checked': '' }} value="Autre" name="contract_type" type="radio" id="Autre">
                                                                <label class="form-check-label" for="Autre">Autres</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Locations -->
                                            <div class="widget">
                                                <h5 class="widgetTitle">Lieux</h5>
                                                <div class="formField lights icons">
                                                    <select class="jobcategory form-control" name="location">
                                                        <option value="" selected>Tout le pays</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ request('location') == $country->id ? 'selected' : '' }}
                                                            >{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa-solid fa-location-dot icon"></i>
                                                </div>
                                            </div>

                                            <div class="widget">
                                                <h5 class="widgetTitle">Expérience</h5>
                                                <div class="formField">
                                                    <div class="row align-items-center justify-content-between gy-2">
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="experience" value="0" type="radio" id="freshgraduate">
                                                                <label class="form-check-label" for="freshgraduate">Jeune iplomé</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="experience" value="1" type="radio" id="beginner">
                                                                <label class="form-check-label" for="beginner">Gradué</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="experience" value="3" type="radio" id="intermediate">
                                                                <label class="form-check-label" for="intermediate">Lincecié</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="experience" value="5" type="radio" id="expert">
                                                                <label class="form-check-label" for="expert">Expert</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100">
                                                Rechercher l'emploi
                                            </button>

                                        </form>
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
                            <div class="gap-3 showingOption">

                                <div class="showingResults">
                                    <div class="showTitle">Resultats:<span class="totalResults">{{ $jobs->count() }}</span>
                                    </div>
                                </div>

                                @if(request()->has('search') || request()->has('contract_type') || request()->has('location') || request()->has('experience') || request()->has('category'))
                                <div class="resultShorting">
                                    <a href="{{ route('jobs') }}" class="btn btn-sm btn-outline-danger rounded-5">
                                        <i class="bi bi-x-circle me-2"></i>
                                        Annuler les filtres
                                    </a>
                                </div>
                                @endif
                               <form class="resultShorting" method="GET">
                                    {{-- Conserver les autres filtres --}}
                                    @foreach(request()->except('per_page') as $key => $value)
                                        @if(is_array($value))
                                            @foreach($value as $item)
                                                <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                                            @endforeach
                                        @else
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                        @endif
                                    @endforeach

                                    <select class="shorting" name="per_page" onchange="this.form.submit()">
                                        <option value="10" {{ request('per_page', 50) == 10 ? 'selected' : '' }}>
                                            10 Par page
                                        </option>

                                        <option value="50" {{ request('per_page', 50) == 50 ? 'selected' : '' }}>
                                            50 Par page
                                        </option>

                                        <option value="100" {{ request('per_page', 50) == 100 ? 'selected' : '' }}>
                                            100 Par page
                                        </option>

                                        <option value="200" {{ request('per_page', 50) == 200 ? 'selected' : '' }}>
                                            200 Par page
                                        </option>
                                    </select>
                                </form>
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
                                                    <div
                                                        class="flex-wrap gap-3 d-flex align-items-start justify-content-start">
                                                        <div class="thumbs">
                                                            <figure class="m-0 bg-secondary rounded-2">
                                                                <img src="{{ asset('images/favicon.png') }}"
                                                                    class="img-fluid avatar avatar-lg rounded-0"
                                                                    alt="">
                                                            </figure>
                                                        </div>

                                                        <div class="flex-fill capsio">
                                                            <h5 class="mb-1 jobTitlename"><a
                                                                    href="#">{{ $job->title }}</a> <i
                                                                    class="bi bi-patch-check-fill text-success"></i></h5>
                                                            <div class="jobTopinfo">
                                                                <div
                                                                    class="gap-2 d-flex align-items-center justify-content-start">
                                                                    <a href="#" class="text-md text-muted fw-medium">{{ $job->category?->name ?? '--' }}</a>
                                                                    <span class="seperate fw-bold">.</span>
                                                                    <a href="#" class="text-md text-seegreen fw-medium">{{ $job->country?->name ?? '--' }}</a>
                                                                    <span class="seperate fw-bold">.</span>
                                                                    <a href="#"class="text-md text-seegreen fw-medium">{{ $job->location ?? '--' }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="saveJob">
                                                    <a href="#" class="Smallbtn" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-title="Voir plus"><i
                                                            class="fa fa-eye"></i></a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mb-2 jobListmiddle">
                                            <div class="mb-4 jobDesc d-block">
                                                <p class="m-0">
                                                    {{ strlen($job->description) > 150 ? substr($job->description, 0, 150) . '...' : $job->description }}
                                                </p>
                                            </div>
                                            <div class="flex-wrap gap-3 d-flex align-items-start justify-content-start">
                                                <span
                                                    class="badge badge-md badge-secondary">Expérience:{{ $job->experience_years ? $job->experience_years . ' an(s)' : '' }}</span>
                                                <span class="badge badge-md badge-secondary">Type de contrat:
                                                    {{ $job->contract_type }}</span>
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
                                                <div
                                                    class="flex-wrap gap-3 d-flex align-items-start justify-content-start">
                                                    <div class="px-5 flex-fill capsio">
                                                        <h5 class="mb-1 jobTitlename"><a href="#">Aucune offre
                                                                disponible</a></h5>
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
                @if ($jobs->hasPages())
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">

                                    {{-- Précédent --}}
                                    <li class="page-item {{ $jobs->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link"
                                        href="{{ $jobs->onFirstPage() ? '#' : $jobs->previousPageUrl() }}">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </a>
                                    </li>

                                    {{-- Pages --}}
                                    @for ($i = 1; $i <= $jobs->lastPage(); $i++)

                                        @if(
                                            $i == 1 ||
                                            $i == $jobs->lastPage() ||
                                            ($i >= $jobs->currentPage() - 2 &&
                                            $i <= $jobs->currentPage() + 2)
                                        )

                                            <li class="page-item {{ $i == $jobs->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $jobs->url($i) }}">
                                                    {{ $i }}
                                                </a>
                                            </li>

                                        @elseif(
                                            $i == $jobs->currentPage() - 3 ||
                                            $i == $jobs->currentPage() + 3
                                        )

                                            <li class="page-item disabled">
                                                <span class="page-link">...</span>
                                            </li>

                                        @endif

                                    @endfor

                                    {{-- Suivant --}}
                                    <li class="page-item {{ !$jobs->hasMorePages() ? 'disabled' : '' }}">
                                        <a class="page-link"
                                        href="{{ $jobs->hasMorePages() ? $jobs->nextPageUrl() : '#' }}">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                @endif
                <!-- Pagination END -->

            </div>

        </div>
        </div>
    </section>
    <!-- ============================ Search Job Wrapper End ================================== -->
@endsection
