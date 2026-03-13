<div class="navbar-header">
    <div class="row align-items-center justify-content-between">
        <div class="col-auto">
            <div class="flex-wrap gap-4 d-flex align-items-center">
                <button type="button" class="sidebar-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="text-2xl icon non-active"></iconify-icon>
                    <iconify-icon icon="iconoir:arrow-right" class="text-2xl icon active"></iconify-icon>
                </button>
                <button type="button" class="sidebar-mobile-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                </button>
                <form class="navbar-search">
                    <input type="text" name="search" placeholder="Search">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </form>
            </div>
        </div>
        <div class="col-auto">
            <div class="flex-wrap gap-3 d-flex align-items-center">
                <button type="button" data-theme-toggle class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>

                <!-- Language dropdown start -->
                @php
                    $currentLang = session('lang') ?? auth()->user()->langue ?? app()->getLocale() ?? 'fr';
                @endphp

                <div class="dropdown d-none d-sm-inline-block">
                    <button
                        class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                        type="button" data-bs-toggle="dropdown">

                        @if($currentLang == 'en')
                            <img src="{{ asset('assets/images/flags/flag1.png') }}"
                                class="w-24 h-24 object-fit-cover rounded-circle">
                        @else
                            <img src="{{ asset('assets/images/flags/flag3.png') }}"
                                class="w-24 h-24 object-fit-cover rounded-circle">
                        @endif

                    </button>

                    <div class="dropdown-menu to-top dropdown-menu-sm">
                        <div class="px-16 py-12 mb-16 radius-8 bg-primary-50">
                            <h6 class="mb-0 text-lg text-primary-light fw-semibold">
                                Choisissez votre langue
                            </h6>
                        </div>

                        <div class="overflow-y-auto max-h-400-px scroll-sm pe-8">

                            {{-- ENGLISH --}}
                            <div onclick="changeLanguage('en')"
                                class="mb-16 cursor-pointer form-check style-check d-flex align-items-center justify-content-between">

                                <span class="gap-3 d-flex align-items-center">
                                    <img src="{{ asset('assets/images/flags/flag1.png') }}"
                                        class="w-36-px h-36-px rounded-circle">
                                    <span class="mb-0 text-md fw-semibold">English</span>
                                </span>

                                <input class="form-check-input"
                                    type="radio"
                                    {{ $currentLang == 'en' ? 'checked' : '' }}>
                            </div>

                            {{-- FRANÇAIS --}}
                            <div onclick="changeLanguage('fr')"
                                class="mb-16 cursor-pointer form-check style-check d-flex align-items-center justify-content-between">

                                <span class="gap-3 d-flex align-items-center">
                                    <img src="{{ asset('assets/images/flags/flag3.png') }}"
                                        class="w-36-px h-36-px rounded-circle">
                                    <span class="mb-0 text-md fw-semibold">Français</span>
                                </span>

                                <input class="form-check-input"
                                    type="radio"
                                    {{ $currentLang == 'fr' ? 'checked' : '' }}>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Language dropdown end -->

                <div class="dropdown">
                    <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset(auth()->user()->image ? 'storage/' . auth()->user()->image : 'build/images/users/avatar-1.png') }}" alt="image"
                            class="w-40-px h-40-px object-fit-cover rounded-circle bg-light-600">
                    </button>
                    <div class="dropdown-menu to-top dropdown-menu-sm">
                        <div
                            class="gap-2 px-16 py-12 mb-16 radius-8 bg-primary-50 d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="mb-2 text-lg text-primary-light fw-semibold">{{ auth()->user()->name }}</h6>
                                <span class="text-sm text-secondary-light fw-medium">{{ auth()->user()->role }}</span>
                            </div>
                            <button type="button" class="hover-text-danger">
                                <iconify-icon icon="radix-icons:cross-1" class="text-xl icon"></iconify-icon>
                            </button>
                        </div>
                        <ul class="to-top-list">
                            <li>
                                <a class="gap-3 px-0 py-8 text-black dropdown-item hover-bg-transparent hover-text-primary d-flex align-items-center" href="{{ route(auth()->user()->getProfileRoute()) }}">
                                    <iconify-icon icon="solar:user-linear" class="text-xl icon"></iconify-icon>Mon Profile
                                </a>
                            </li>
                            <li>
                                <a class="gap-3 px-0 py-8 text-black dropdown-item hover-bg-transparent hover-text-primary d-flex align-items-center" href="{{ route(auth()->user()->getSettingRoute()) }}">
                                    <iconify-icon icon="icon-park-outline:setting-two" class="text-xl icon"></iconify-icon>Paramètres
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" onsubmit="clearGoogleTranslate()">
                                    @csrf
                                    <button class="gap-3 px-0 py-8 text-black dropdown-item hover-bg-transparent hover-text-danger d-flex align-items-center" type="submit">
                                        <iconify-icon icon="lucide:power" class="text-xl icon"></iconify-icon>Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div><!-- Profile dropdown end -->
            </div>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="px-24 mb-0 text-lg alert alert-success bg-success-100 text-success-600 border-success-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 py-13 fw-semibold radius-4 d-flex align-items-center justify-content-between"
        role="alert">
        <div class="gap-2 d-flex align-items-center">
            <iconify-icon icon="akar-icons:double-check" class="text-xl icon"></iconify-icon>
            {{ session('success') }}
        </div>
        <button class="remove-button text-success-600 text-xxl line-height-1"> <iconify-icon
                icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
    </div>

    <script>
        setTimeout(() => {
            $('.alert').addClass('d-none');
        }, 6000);
    </script>
@endif

@if (session('error'))
    <div class="px-24 mb-0 text-lg alert alert-danger bg-danger-100 text-danger-600 border-danger-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 py-13 fw-semibold radius-4 d-flex align-items-center justify-content-between"
        role="alert">
        <div class="gap-2 d-flex align-items-center">
            <iconify-icon icon="mdi:alert-circle-outline" class="text-xl icon"></iconify-icon>
            {{ session('error') }}
        </div>
        <button class="remove-button text-danger-600 text-xxl line-height-1"> <iconify-icon
                icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
    </div>

    <script>
        setTimeout(() => {
            $('.alert').addClass('d-none');
        }, 6000);
    </script>
@endif

@if (session('info'))
    <div class="px-24 mb-0 text-lg alert alert-info bg-info-100 text-info-600 border-info-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 py-13 fw-semibold radius-4 d-flex align-items-center justify-content-between"
        role="alert">
        <div class="gap-2 d-flex align-items-center">
            <iconify-icon icon="mdi:alert-circle-outline" class="text-xl icon"></iconify-icon>
            {{ session('info') }}
        </div>
        <button class="remove-button text-info-600 text-xxl line-height-1"> <iconify-icon
                icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
    </div>

    <script>
        setTimeout(() => {
            $('.alert').addClass('d-none');
        }, 6000);
    </script>
@endif
