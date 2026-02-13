<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>

    <div>
        <a href="{{ route('candidate.index') }}" class="sidebar-logo">
            <img src="{{ asset('images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('images/logo.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('images/favicon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>

    <div class="sidebar-menu-area">
        @php
            $user = auth()->user();
        @endphp

        @if($user->isCandidate())
            @include('partials.candidate_sidebar')
        @elseif($user->isClient())
            @include('partials.client_sidebar')
        @elseif($user->isAdmin())
            @include('partials.admin_sidebar')
        @endif
    </div>
</aside>
