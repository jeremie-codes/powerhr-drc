 <ul class="sidebar-menu" id="sidebar-menu">

            <li class="sidebar-menu-group-title">Accueil</li>

            {{-- DASHBOARD --}}
            <li class="{{ request()->routeIs('candidate.index') ? 'active' : '' }}">
                <a href="{{ route('candidate.index') }}">
                    <i class="text-xl ri-home-4-line menu-icon"></i>
                    <span>Tablau de bord</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Offres</li>

            {{-- LISTE DES OFFRES --}}
            <li class="{{ request()->routeIs('candidate.jobs.index') ? 'active' : '' }}">
                <a href="{{ route('candidate.jobs.index') }}">
                    <i class="text-xl ri-briefcase-2-line menu-icon"></i>
                    <span>Offres disponibles</span>
                </a>
            </li>

            {{-- MES CANDIDATURES --}}
            <li class="{{ request()->routeIs('candidate.jobs.apply') ? 'active' : '' }}">
                <a href="{{ route('candidate.jobs.apply') }}">
                    <i class="text-xl ri-file-gif-line menu-icon"></i>
                    <span>Mes candidatures</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Mon Compte</li>

            {{-- PROFIL --}}
            <li class="{{ request()->routeIs('candidate.profile.index') ? 'active' : '' }}">
                <a href="{{ route('candidate.profile.index') }}">
                    <i class="text-xl ri-user-line menu-icon"></i>
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
                    <i class="text-xl ri-file-line menu-icon"></i>
                    <span>Mon CV</span>
                </a>
            </li>

        </ul>
