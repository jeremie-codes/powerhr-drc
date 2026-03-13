<ul class="sidebar-menu" id="sidebar-menu">

     <li class="sidebar-menu-group-title">Accueil</li>

     {{-- DASHBOARD --}}
     <li class="{{ request()->routeIs('client.index') ? 'active' : '' }}">
         <a href="{{ route('client.index') }}">
             <i class="text-xl ri-home-4-line menu-icon"></i>
             <span>Tablau de bord</span>
         </a>
     </li>

     <li class="sidebar-menu-group-title">Offres</li>

     {{-- LISTE DES OFFRES --}}
     <li class="{{ request()->routeIs('client.jobs.index*') ? 'active' : '' }}">
         <a href="{{ route('client.jobs.index') }}">
             <i class="text-xl ri-briefcase-2-line menu-icon"></i>
             <span>Liste des Offres</span>
         </a>
     </li>

     {{-- MES CANDIDATURES --}}
     <li class="{{ request()->routeIs('client.jobs.apply*') ? 'active' : '' }}">
         <a href="{{ route('client.jobs.apply') }}">
             <i class="text-xl ri-file-gif-line menu-icon"></i>
             <span>Liste des candidatures</span>
         </a>
     </li>

     @if(auth()->user()->company)
     <li class="sidebar-menu-group-title">Recherche</li>

     {{-- TROUVER UN PROFIL --}}
     <li class="{{ request()->routeIs('client.candidate.index*') ? 'active' : '' }}">
         <a href="{{ route('client.candidate.index') }}">
             <i class="text-xl ri-file-user-line menu-icon"></i>
             <span>Liste des employés</span>
         </a>
     </li>

     {{-- FIND PROFILE --}}
     <li class="{{ request()->routeIs('client.search*') ? 'active' : '' }}">
         <a href="{{ route('client.search') }}">
             <i class="text-xl ri-user-search-line menu-icon"></i>
             <span>Trouver un profil</span>
         </a>
     </li>

     {{-- RECOMMENDED PROFILE --}}
     <li class="{{ request()->routeIs('client.candidate.recommended*') ? 'active' : '' }}">
         <a href="{{ route('client.candidate.recommended') }}">
             <i class="text-xl ri-user-follow-line menu-icon"></i>
             <span>Profile recommandés</span>
         </a>
     </li>
    @endif

    <li class="sidebar-menu-group-title">Mon Compte</li>

     {{-- PROFIL --}}
     <li class="{{ request()->routeIs('client.profile.index*') ? 'active' : '' }}">
         <a href="{{ route('client.profile.index') }}">
             <i class="text-xl ri-folder-user-line menu-icon"></i>
             <span>Profil entreprise</span>
         </a>
     </li>

     {{-- PARAMÈTRES --}}
     <li class="{{ request()->routeIs('client.settings.index*') ? 'active' : '' }}">
         <a href="{{ route('client.settings.index') }}">
             <i class="text-xl ri-user-settings-line d-flex"></i>
             <span>Utilisateur</span>
         </a>
     </li>

     {{-- CONTRAT --}}
     <li class="{{ request()->routeIs('client.briefs.index*') ? 'active' : '' }}">
         <a href="{{ route('client.briefs.index') }}">
             <i class="text-xl ri-file-forbid-line menu-icon"></i>
             <span>Contrat</span>
         </a>
     </li>

 </ul>
