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
                <button type="button" data-theme-toggle
                    class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                <div class="dropdown d-none d-sm-inline-block">
                    <button
                        class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                        type="button" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/images/flags/flag3.png') }}" alt="image"
                            class="w-24 h-24 object-fit-cover rounded-circle">
                    </button>
                    <div class="dropdown-menu to-top dropdown-menu-sm">
                        <div
                            class="gap-2 px-16 py-12 mb-16 radius-8 bg-primary-50 d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="mb-0 text-lg text-primary-light fw-semibold">Choississez votre langue</h6>
                            </div>
                        </div>

                        <div class="overflow-y-auto max-h-400-px scroll-sm pe-8">
                            <div class="mb-16 form-check style-check d-flex align-items-center justify-content-between">
                                <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                    for="english">
                                    <span
                                        class="gap-3 text-black hover-bg-transparent hover-text-primary d-flex align-items-center">
                                        <img src="{{ asset('assets/images/flags/flag1.png') }}" alt=""
                                            class="flex-shrink-0 w-36-px h-36-px bg-success-subtle text-success-main rounded-circle">
                                        <span class="mb-0 text-md fw-semibold">English</span>
                                    </span>
                                </label>
                                <input class="form-check-input" type="radio" name="crypto" id="english">
                            </div>

                            <div class="mb-16 form-check style-check d-flex align-items-center justify-content-between">
                                <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                    for="france">
                                    <span
                                        class="gap-3 text-black hover-bg-transparent hover-text-primary d-flex align-items-center">
                                        <img src="{{ asset('assets/images/flags/flag3.png') }}" alt=""
                                            class="flex-shrink-0 w-36-px h-36-px bg-success-subtle text-success-main rounded-circle">
                                        <span class="mb-0 text-md fw-semibold">Français</span>
                                    </span>
                                </label>
                                <input class="form-check-input" type="radio" name="crypto" id="france">
                            </div>

                        </div>
                    </div>
                </div><!-- Language dropdown end -->

                <div class="dropdown">
                    <button
                        class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                        type="button" data-bs-toggle="dropdown">
                        <iconify-icon icon="iconoir:bell" class="text-xl text-primary-light"></iconify-icon>
                    </button>
                    <div class="p-0 dropdown-menu to-top dropdown-menu-lg">
                        <div
                            class="gap-2 px-16 py-12 m-16 mb-16 radius-8 bg-primary-50 d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="mb-0 text-lg text-primary-light fw-semibold">Notifications</h6>
                            </div>
                            <span
                                class="text-lg text-primary-600 fw-semibold w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                        </div>

                        <div class="overflow-y-auto max-h-400-px scroll-sm pe-4">
                            <a href="javascript:void(0)"
                                class="gap-3 px-24 py-12 mb-2 d-flex align-items-start justify-content-between">
                                <div
                                    class="gap-3 text-black hover-bg-transparent hover-text-primary d-flex align-items-center">
                                    <span
                                        class="flex-shrink-0 w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center">
                                        <iconify-icon icon="bitcoin-icons:verify-outline"
                                            class="icon text-xxl"></iconify-icon>
                                    </span>
                                    <div>
                                        <h6 class="mb-4 text-md fw-semibold">Congratulations</h6>
                                        <p class="mb-0 text-sm text-secondary-light text-w-200-px">Your profile has been
                                            Verified. Your
                                            profile has been Verified</p>
                                    </div>
                                </div>
                                <span class="flex-shrink-0 text-sm text-secondary-light">23 Mins ago</span>
                            </a>

                            <a href="javascript:void(0)"
                                class="gap-3 px-24 py-12 mb-2 d-flex align-items-start justify-content-between bg-neutral-50">
                                <div
                                    class="gap-3 text-black hover-bg-transparent hover-text-primary d-flex align-items-center">
                                    <span
                                        class="flex-shrink-0 w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="assets/images/notification/profile-1.png" alt="">
                                    </span>
                                    <div>
                                        <h6 class="mb-4 text-md fw-semibold">Ronald Richards</h6>
                                        <p class="mb-0 text-sm text-secondary-light text-w-200-px">You can stitch
                                            between artboards</p>
                                    </div>
                                </div>
                                <span class="flex-shrink-0 text-sm text-secondary-light">23 Mins ago</span>
                            </a>

                            <a href="javascript:void(0)"
                                class="gap-3 px-24 py-12 mb-2 d-flex align-items-start justify-content-between">
                                <div
                                    class="gap-3 text-black hover-bg-transparent hover-text-primary d-flex align-items-center">
                                    <span
                                        class="flex-shrink-0 w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center">
                                        AM
                                    </span>
                                    <div>
                                        <h6 class="mb-4 text-md fw-semibold">Arlene McCoy</h6>
                                        <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                            prototyping</p>
                                    </div>
                                </div>
                                <span class="flex-shrink-0 text-sm text-secondary-light">23 Mins ago</span>
                            </a>

                        </div>

                        <div class="px-16 py-12 text-center">
                            <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                Notification</a>
                        </div>

                    </div>
                </div><!-- Notification dropdown end -->

                <div class="dropdown">
                    <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('build/images/users/avatar-1.png') }}" alt="image"
                            class="w-40-px h-40-px object-fit-cover rounded-circle">
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
                                <a class="gap-3 px-0 py-8 text-black dropdown-item hover-bg-transparent hover-text-primary d-flex align-items-center"
                                    href="{{ route(auth()->user()->getProfileRoute()) }}">
                                    <iconify-icon icon="solar:user-linear" class="text-xl icon"></iconify-icon> Mon Profile</a>
                            </li>
                            <li>
                                <a class="gap-3 px-0 py-8 text-black dropdown-item hover-bg-transparent hover-text-primary d-flex align-items-center"
                                    href="email.html">
                                    <iconify-icon icon="tabler:message-check" class="text-xl icon"></iconify-icon>
                                    Inbox</a>
                            </li>
                            <li>
                                <a class="gap-3 px-0 py-8 text-black dropdown-item hover-bg-transparent hover-text-primary d-flex align-items-center"
                                    href="company.html">
                                    <iconify-icon icon="icon-park-outline:setting-two"
                                        class="text-xl icon"></iconify-icon> Setting</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="gap-3 px-0 py-8 text-black dropdown-item hover-bg-transparent hover-text-danger d-flex align-items-center" type="submit">
                                        <iconify-icon icon="lucide:power" class="text-xl icon"></iconify-icon> Log Out
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
            <iconify-icon icon="mdi:alert-circle-outline" class="text-xl icon"></iconify-icon>
            {{ session('success') }}
        </div>
        <button class="remove-button text-success-600 text-xxl line-height-1"> <iconify-icon
                icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
    </div>
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
@endif
