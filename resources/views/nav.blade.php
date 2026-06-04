<!-- Start Navigation -->
<div class="header header-transparent" data-sticky-element="">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="{{ asset('assets-2/img/web-icon-w.png') }}" class="logo main-logo" alt="">
                    <img src="{{ asset('assets-2/img/web-icon.png') }}" class="logo change-logo" alt="">
                    <img src="{{ asset('assets-2/img/web-icon.png') }}" class="logo mobile-logo" alt="">
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            <a href="{{ route('login.view') }}" class="d-flex align-items-center"><i class="bi bi-person-circle me-1"></i></a>
                        </li>
                        <li>
                            <a href="#" ><i class="bi bi-search me-1"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">

                    <li class="{{ Route::is('index') ? 'active': '' }}"><a href="{{ route('index') }}">Accueil</a></li>

                    <li class="{{ Route::is('jobs') ? 'active': '' }}"><a href="{{ route('jobs') }}">Emplois</a></li>

                    <li class="{{ Route::is('contact') ? 'active': '' }}"><a href="{{ route('contact') }}">Contact</a></li>

                    <li class="{{ Route::is('faq') ? 'active': '' }}"><a href="{{ route('faq') }}">FAQ</a></li>

                    <li class="mob-addproject"><a class="add" href="{{ route('client.jobs.create') }}"><i class="bi bi-patch-plus me-2"></i>Publier Une Offre</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <!-- Language dropdown start -->
                    @php
                        $currentLang = session('lang') ?? auth()->user()->langue ?? 'fr';
                    @endphp
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
                                <div onclick="changeLanguage('fr')" class="py-2 form-check style-check d-flex align-items-center justify-content-between {{ $currentLang == 'fr' ? 'bg-primary' : '' }}" style="cursor: pointer;">
                                    <span class="gap-3 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/flags/flag3.png') }}"
                                            class="w-36-px h-36-px rounded-circle">
                                        <span class="mb-0 text-md fw-semibold">Français</span>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div onclick="changeLanguage('en')" class="py-2 form-check style-check d-flex align-items-center justify-content-between {{ $currentLang == 'en' ? 'bg-primary' : '' }}" style="cursor: pointer;">
                                    <span class="gap-3 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/flags/flag1.png') }}"
                                            class="w-36-px h-36-px rounded-circle">
                                        <span class="mb-0 text-md fw-semibold">English</span>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('login.view') }}"><i class="bi bi-person-circle me-2"></i>Connexion</a>
                    </li>
                    <li class="list-buttons light">
                        <a href="{{ route('client.jobs.create') }}"><i class="bi bi-patch-plus me-2"></i>Publier Une Offre</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
