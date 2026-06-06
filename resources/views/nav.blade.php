@php
    $currentLang = app()->getLocale();
@endphp

<!-- Start Navigation -->
<div class="header header-transparent" data-sticky-element="">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('index', ['locale' => app()->getLocale()]) }}">
                    <img src="{{ asset('assets-2/img/web-icon-ww.png') }}" class="logo main-logo" alt="">
                    <img src="{{ asset('assets-2/img/web-icon.png') }}" class="logo change-logo" alt="">
                    <img src="{{ asset('assets-2/img/web-icon.png') }}" class="logo mobile-logo" alt="">
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            <div class="btn-group">
                                <a class="dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if($currentLang == 'en')
                                        <img src="{{ asset('assets/images/flags/flag1.png') }}" width="25" height="25" class="object-fit-cover rounded-circle">
                                    @else
                                        <img src="{{ asset('assets/images/flags/flag3.png') }}" width="25" height="25" class="object-fit-cover rounded-circle">
                                    @endif
                                </a>
                                <div
                                    class="p-0 dropdown-menu dropdown-menu-start"
                                    aria-labelledby="triggerId"
                                >
                                    <a class="dropdown-item w-100 {{ $currentLang == 'fr' ? 'bg-light' : '' }}" href="#">
                                        <div class="gap-3 d-flex align-items-center w-100">
                                            <img src="{{ asset('assets/images/flags/flag3.png') }}"
                                                class="w-36-px h-36-px rounded-circle">
                                            <span class="mb-0 text-md fw-semibold">Français</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item w-100 {{ $currentLang == 'en' ? 'bg-light' : '' }}" href="#">
                                        <div class="gap-3 d-flex align-items-center w-100">
                                            <img src="{{ asset('assets/images/flags/flag1.png') }}"
                                                class="w-36-px h-36-px rounded-circle">
                                            <span class="mb-0 text-md fw-semibold">English</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('login.view', ['locale' => app()->getLocale()]) }}" class="d-flex align-items-center"><i class="bi bi-person-circle me-1"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">

                    <li class="{{ Route::is('index') ? 'active': '' }}"><a href="{{ route('index', ['locale' => app()->getLocale()]) }}">Accueil</a></li>

                    <li class="{{ Route::is('jobs') ? 'active': '' }}"><a href="{{ route('jobs', ['locale' => app()->getLocale()]) }}">Emplois</a></li>

                    <li class="{{ Route::is('about') ? 'active': '' }}"><a href="{{ route('about', ['locale' => app()->getLocale()]) }}">A propos</a></li>

                    <li class="{{ Route::is('contact') ? 'active': '' }}"><a href="{{ route('contact', ['locale' => app()->getLocale()]) }}">Contact</a></li>

                    <li class="{{ Route::is('faq') ? 'active': '' }}"><a href="{{ route('faq', ['locale' => app()->getLocale()]) }}">FAQ</a></li>

                    <li class="mob-addproject"><a class="add" href="{{ route('client.jobs.create', ['locale' => app()->getLocale()]) }}"><i class="bi bi-patch-plus me-2"></i>Publier Une Offre</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <!-- Language dropdown start -->
                    <li>
                        <a href="JavaScript:Void(0);">
                            @if($currentLang == 'en')
                                <img src="{{ asset('assets/images/flags/flag1.png') }}" width="25" height="25" class="object-fit-cover rounded-circle">
                            @else
                                <img src="{{ asset('assets/images/flags/flag3.png') }}" width="25" height="25" class="object-fit-cover rounded-circle">
                            @endif
                        </a>
                        <ul class="nav-dropdown nav-submenu">
                            <li>
                                <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => 'fr'])) }}" class="py-2 form-check style-check d-flex align-items-center justify-content-between {{ $currentLang == 'fr' ? 'bg-light' : '' }}" style="cursor: pointer;">
                                    <span class="gap-3 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/flags/flag3.png') }}"
                                            class="w-36-px h-36-px rounded-circle">
                                        <span class="mb-0 text-md fw-semibold">Français</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => 'en'])) }}" class="py-2 form-check style-check d-flex align-items-center justify-content-between {{ $currentLang == 'en' ? 'bg-light' : '' }}" style="cursor: pointer;">
                                    <span class="gap-3 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/flags/flag1.png') }}"
                                            class="w-36-px h-36-px rounded-circle">
                                        <span class="mb-0 text-md fw-semibold">English</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('login.view', ['locale' => app()->getLocale()]) }}"><i class="bi bi-person-circle me-2"></i>Connexion</a>
                    </li>
                    <li class="list-buttons light">
                        <a href="{{ route('client.jobs.create', ['locale' => app()->getLocale()]) }}"><i class="bi bi-patch-plus me-2"></i>Publier Une Offre</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
