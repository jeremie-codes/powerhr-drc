 <ul class="sidebar-menu" id="sidebar-menu">

            <li class="sidebar-menu-group-title">Accueil</li>

            {{-- DASHBOARD --}}
            <li class="{{ request()->routeIs('candidate.index') ? 'active' : '' }}">
                <a href="{{ route('candidate.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Tablau de bord</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Offres</li>

            {{-- LISTE DES OFFRES --}}
            <li class="{{ request()->routeIs('candidate.jobs.index') ? 'active' : '' }}">
                <a href="{{ route('candidate.jobs.index') }}">
                    <iconify-icon icon="mdi:briefcase-search-outline" class="menu-icon"></iconify-icon>
                    <span>Offres disponibles</span>
                </a>
            </li>

            {{-- MES CANDIDATURES --}}
            <li class="{{ request()->routeIs('candidate.jobs.apply') ? 'active' : '' }}">
                <a href="{{ route('candidate.jobs.apply') }}">
                    <iconify-icon icon="mdi:file-document-check-outline" class="menu-icon"></iconify-icon>
                    <span>Mes candidatures</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Mon Compte</li>

            {{-- PROFIL --}}
            <li class="{{ request()->routeIs('candidate.profile.index') ? 'active' : '' }}">
                <a href="{{ route('candidate.profile.index') }}">
                    <iconify-icon icon="mdi:account-outline" class="menu-icon"></iconify-icon>
                    <span>Mon Profil</span>
                </a>
            </li>

            {{-- PARAMÈTRES --}}
            <li class="{{ request()->routeIs('candidate.settings.index') ? 'active' : '' }}">
                <a href="{{ route('candidate.settings.index') }}">
                    <i class="text-xl ri-user-settings-line d-flex"></i>
                    <span>Paramètres</span>
                </a>
            </li>

            {{-- MON CV --}}
            <li class="{{ request()->routeIs('candidate.cv.index') ? 'active' : '' }}">
                <a href="{{ route('candidate.cv.index') }}">
                    <iconify-icon icon="mdi:file-account-outline" class="menu-icon"></iconify-icon>
                    <span>Mon CV</span>
                </a>
            </li>

        </ul>
