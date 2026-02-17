 <ul class="sidebar-menu" id="sidebar-menu">

     <li class="sidebar-menu-group-title">Accueil</li>

     {{-- DASHBOARD --}}
     <li class="{{ request()->routeIs('client.index') ? 'active' : '' }}">
         <a href="{{ route('client.index') }}">
             <iconify-icon icon="solar:home-smile-angle-outline" class="text-xl menu-icon"></iconify-icon>
             <span>Tablau de bord</span>
         </a>
     </li>

     <li class="sidebar-menu-group-title">Offres</li>

     {{-- LISTE DES OFFRES --}}
     <li class="{{ request()->routeIs('client.jobs.index*') ? 'active' : '' }}">
         <a href="{{ route('client.jobs.index') }}">
             <iconify-icon icon="mdi:briefcase-search-outline" class="text-xl menu-icon"></iconify-icon>
             <span>Mes Offres</span>
         </a>
     </li>

     {{-- MES CANDIDATURES --}}
     <li class="{{ request()->routeIs('client.jobs.apply*') ? 'active' : '' }}">
         <a href="{{ route('client.jobs.apply') }}">
             <iconify-icon icon="mdi:file-document-check-outline" class="text-xl menu-icon"></iconify-icon>
             <span>Liste des candidatures</span>
         </a>
     </li>

     @if(auth()->user()->company)
     <li class="sidebar-menu-group-title">Recherche</li>

     {{-- TROUVER UN PROFIL --}}
     <li class="{{ request()->routeIs('client.candidate.index*') ? 'active' : '' }}">
         <a href="{{ route('client.candidate.index') }}">
             <iconify-icon icon="mdi:file-document-check-outline" class="text-xl menu-icon"></iconify-icon>
             <span>Liste des employés</span>
         </a>
     </li>

     {{-- FIND PROFILE --}}
     <li class="{{ request()->routeIs('client.search*') ? 'active' : '' }}">
         <a href="{{ route('client.search') }}">
             <iconify-icon icon="mdi:account-search-outline" class="text-xl menu-icon"></iconify-icon>
             <span>Trouver un profil</span>
         </a>
     </li>

     {{-- RECOMMENDED PROFILE --}}
     <li class="{{ request()->routeIs('client.candidate.recommended*') ? 'active' : '' }}">
         <a href="{{ route('client.candidate.recommended') }}">
             <iconify-icon icon="mdi:file-document-check-outline" class="text-xl menu-icon"></iconify-icon>
             <span>Profile recommandés</span>
         </a>
     </li>
     @endif

     <li class="sidebar-menu-group-title">Mon Compte</li>

     {{-- PROFIL --}}
     <li class="{{ request()->routeIs('client.profile.index*') ? 'active' : '' }}">
         <a href="{{ route('client.profile.index') }}">
             <iconify-icon icon="mdi:account-outline" class="text-xl menu-icon"></iconify-icon>
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
             <iconify-icon icon="mdi:file-outline" class="text-xl menu-icon"></iconify-icon>
             <span>Contrat</span>
         </a>
     </li>

 </ul>
