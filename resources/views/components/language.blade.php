@php
    $currentLang = app()->getLocale() ?? auth()->user()->langue ?? 'fr';
@endphp

<div class="relative dropdown text-end">
    <button type="button"
        class="inline-flex items-center gap-3 dropdown-toggle btn border-slate-200" id="dropdownMenuButton">
        @switch($currentLang)
            @case('fr')
                <img src="{{ URL::asset('build/images/flags/20/fr.svg') }}" alt="" id="header-lang-img"
                    class="object-cover h-5 rounded-full">
                <span class="text-sm font-medium text-slate-600">Français</span>
            @break
            @case('en')
                <img src="{{ URL::asset('build/images/flags/20/us.svg') }}" alt="" id="header-lang-img"
                    class="object-cover h-5 rounded-full">
                <span class="text-sm font-medium text-slate-600">Anglais</span>
            @break

            @default
                <img src="{{ URL::asset('build/images/flags/20/fr.svg') }}" alt="" id="header-lang-img"
                    class="object-cover h-5 rounded-full">
                <span class="text-sm font-medium text-slate-600">Français</span>
        @endswitch
    </button>

   <div class="absolute z-50 p-3 mt-1 bg-white rounded-md shadow-md dropdown-menu min-w-[9rem] flex flex-col gap-3 hidden">

        <!-- FR -->
        <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => 'fr'])) }}"
            class="flex items-center gap-3 cursor-pointer">
            <img src="{{ URL::asset('build/images/flags/fr.svg') }}"
                class="object-cover h-4 rounded-full">
            <span class="text-sm font-medium text-slate-600">Français</span>
        </a>

        <!-- EN -->
        <a href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale' => 'en'])) }}"
            class="flex items-center gap-3 cursor-pointer">
            <img src="{{ URL::asset('build/images/flags/us.svg') }}"
                class="object-cover h-4 rounded-full">
            <span class="text-sm font-medium text-slate-600">Anglais</span>
        </a>

    </div>

</div>

