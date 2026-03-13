<ul class="sidebar-menu" id="sidebar-menu">

    <li class="sidebar-menu-group-title">Accueil</li>

    {{-- DASHBOARD --}}
    <li class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
        <a href="{{ route('admin.index') }}">
            <i class="text-xl ri-home-4-line menu-icon"></i>
            <span>Tablau de bord</span>
        </a>
    </li>

    <li class="sidebar-menu-group-title">Offres</li>

    {{-- LISTE DES OFFRES --}}
    <li class="{{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
        <a href="{{ route('admin.jobs.index') }}">
            <i class="text-xl ri-briefcase-2-line menu-icon"></i>
            <span>Liste des Offres</span>
        </a>
    </li>

    {{-- MES CANDIDATURES --}}
    <li class="{{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
        <a href="{{ route('admin.jobs.apply') }}">
            <i class="text-xl ri-file-gif-line menu-icon"></i>
            <span>Liste des candidatures</span>
        </a>
    </li>

    <li class="sidebar-menu-group-title">Recherche</li>

    {{-- LISTE DES CLIENTS --}}
    <li class="{{ request()->routeIs('admin.client.*') ? 'active' : '' }}">
        <a href="{{ route('admin.client.index') }}">
            <i class="text-xl ri-stack-line menu-icon"></i>
            <span>Liste des clients</span>
        </a>
    </li>

    {{-- LISTE DES CANDIDATS --}}
    <li class="{{ request()->routeIs('admin.canidates.*') ? 'active' : '' }}">
        <a href="{{ route('admin.candidates.index') }}">
            <i class="text-xl ri-stack-line menu-icon"></i>
            <span>Liste des candidats</span>
        </a>
    </li>

    {{-- PROFIL CLIENT --}}
    <li class="{{ request()->routeIs('admin.candidate.recommended.*') ? 'active' : '' }}">
        <a href="{{ route('admin.candidate.index') }}">
            <i class="text-xl ri-file-user-line menu-icon"></i>
            <span>Liste des employés</span>
        </a>
    </li>

    {{-- RECOMMENDED PROFILE --}}
    <li class="{{ request()->routeIs('admin.candidate.recommended.*') ? 'active' : '' }}">
        <a href="{{ route('admin.candidate.recommended') }}">
            <i class="text-xl ri-user-follow-line menu-icon"></i>
            <span>Profile recommandés</span>
        </a>
    </li>

    <li class="sidebar-menu-group-title">Mon Compte</li>

    {{-- PROFIL --}}
    <li class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
        <a href="{{ route('admin.profile.index') }}">
            <i class="text-xl ri-user-settings-line d-flex"></i>
            <span>Mon Profil</span>
        </a>
    </li>

    {{-- PARAMÈTRES --}}
    <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}">
            <i class="text-xl ri-group-3-line d-flex"></i>
            <span>Gestion d'Utilisateur</span>
        </a>
    </li>

</ul>
