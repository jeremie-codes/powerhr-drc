 <ul class="sidebar-menu" id="sidebar-menu">

            <li class="sidebar-menu-group-title">Accueil</li>

            {{-- DASHBOARD --}}
            <li class="{{ request()->routeIs('client.index') ? 'active' : '' }}">
                <a href="{{ route('client.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Tablau de bord</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Offres</li>

            {{-- LISTE DES OFFRES --}}
            <li class="{{ request()->routeIs('client.jobs.index') ? 'active' : '' }}">
                <a href="{{ route('client.jobs.index') }}">
                    <iconify-icon icon="mdi:briefcase-search-outline" class="menu-icon"></iconify-icon>
                    <span>Mes Offres</span>
                </a>
            </li>

            {{-- MES CANDIDATURES --}}
            <li class="{{ request()->routeIs('client.jobs.apply') ? 'active' : '' }}">
                <a href="{{ route('client.jobs.apply') }}">
                    <iconify-icon icon="mdi:file-document-check-outline" class="menu-icon"></iconify-icon>
                    <span>Liste des candidatures</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Mon Compte</li>

            {{-- PROFIL --}}
            <li class="{{ request()->routeIs('client.profile.index') ? 'active' : '' }}">
                <a href="{{ route('client.profile.index') }}">
                    <iconify-icon icon="mdi:account-outline" class="menu-icon"></iconify-icon>
                    <span>Profil entreprise</span>
                </a>
            </li>

            {{-- PARAMÈTRES --}}
            <li class="{{ request()->routeIs('client.settings.index') ? 'active' : '' }}">
                <a href="{{ route('client.settings.index') }}">
                    <iconify-icon icon="mdi:cog-outline" class="menu-icon"></iconify-icon>
                    <span>Utilisateur</span>
                </a>
            </li>

        </ul>
