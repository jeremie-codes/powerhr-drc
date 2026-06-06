@extends('auth.layouts.master')
@section('title')
    {{ 'LOGIN' }}
@endsection
@section('content')

    <body class="flex items-center justify-center min-h-screen px-4 py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">
        <div class="mb-0 border-none shadow-none xl:w-2/3 card bg-white/70 dark:bg-zink-500/70">
            <div class="grid grid-cols-1 gap-0 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <div class="!px-12 !py-12 card-body">

                        <div class="text-center">
                            <h4 class="mb-2 text-primary dark:text-primary">Bon retour parmis nous !</h4>
                            <p class="text-slate-500 dark:text-zink-200">Connectez-vous à votre compte</p>
                        </div>

                        @if (session('success'))
                            <div
                                class="px-4 py-3 mt-4 text-sm font-medium text-green-600 border border-transparent rounded-md bg-green-50">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div
                                class="px-4 py-3 mt-4 text-sm font-medium text-red-600 border border-transparent rounded-md bg-red-50">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="mt-10" id="signInForm" onsubmit="disableBtn()">
                            @csrf
                            <div class="mb-3">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" type="email" name="email" required autofocus
                                    autocomplete="username" placeholder="Saisissez votre mail" />
                                <x-input-error for="email" />
                            </div>
                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <div>
                                        <x-label for="password" value="{{ __('Mot de passe') }}" />
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                                class="text-sm text-gray-500 dark:text-gray-100">Mot de passe oublié?</a>
                                        @endif
                                    </div>
                                </div>
                                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                                    autocomplete="current-password" placeholder="Saisissez votre mot de passe" />
                                <x-input-error for="password" />
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <label for="remember_me"
                                        class="inline-block text-base font-medium align-middle cursor-pointer">Se souvenir
                                        de moi.</label>
                                </div>
                                <x-input-error for="remember" />
                            </div>
                            <div class="mt-5">
                                <button type="submit" id="submit-btn"
                                    class="w-full text-white bg-orange-400 border-orange-400 btn hover:text-white hover:bg-orange-700 hover:border-orange-700 focus:text-white focus:bg-orange-700 focus:border-orange-700 focus:ring focus:ring-custom-100 active:text-white active:bg-orange-700 active:border-orange-700 active:ring active:ring-custom-100 dark:ring-custom-400/20">Se
                                    connecter
                                </button>
                            </div>

                            <div class="mt-10 text-center">
                                <p class="mb-0 text-slate-500 dark:text-zink-200">Vous n'avez pas de compte ?
                                    <a href="{{ route('register.view', ['locale' => app()->getLocale()]) }}" class="font-semibold underline transition-all duration-150 ease-linear text-primary dark:text-zink-200 hover:text-primary dark:hover:text-primary">
                                        S'inscrire
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mx-2 mt-2 mb-2 border-none shadow-none lg:col-span-7 card bg-white/60 dark:bg-zink-500/60">
                    <div class="!px-10 !pt-10 h-full !pb-0 card-body flex flex-col">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <a href="{{ route('index') }}">
                                    <x-application-logo />
                                </a>
                            </div>
                            <div class="shrink-0">
                                <x-language />
                            </div>
                        </div>
                        <div class="mt-auto">
                            <img src="{{ URL::asset('images/login-image.png') }}" alt="" class="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
           function disableBtn() {
                const btn = document.getElementById('submit-btn');

                // Désactive le bouton
                btn.disabled = true;

                // Ajoute un style visuel (optionnel selon ton CSS)
                btn.style.opacity = "0.5";
                btn.style.cursor = "not-allowed";

                // Change le texte pour rassurer l'utilisateur
                btn.innerText = "Connexion en cours...";

                return true; // Important pour laisser le formulaire s'envoyer
            }
            </script>
    @endsection
