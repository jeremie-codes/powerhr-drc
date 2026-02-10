@extends('admin.layouts.master-without-nav')
@section('title')
    {{ __('REGISTER') }}
@endsection
@section('content')

    <body
        class="flex items-center justify-center min-h-screen px-4 py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">
        <div class="mb-0 border-none shadow-none xl:w-2/3 card bg-white/70 dark:bg-zink-500/70">
            <div class="grid grid-cols-1 gap-0 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <div class="!px-10 !py-12 card-body">

                        <div class="text-center">
                            <h4 class="mb-2 text-purple-500 dark:text-purple-500">Bienvenue !</h4>
                            <p class="text-slate-500 dark:text-zink-200">Créer un compte pour continuer.</p>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('register') }}" class="mt-10">
                                @csrf

                                <div class="mb-3">
                                    <x-label for="name" value="{{ __('Name') }}" />
                                    <x-input id="name" type="text" name="name" :value="old('name')" required
                                        autofocus autocomplete="name" placeholder="Entrer votre nom" />
                                    <x-input-error for="name" />
                                </div>
                                <div class="mb-3">
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <x-input id="email" type="email" name="email" :value="old('email')" required
                                        autocomplete="username" placeholder="Entrer votre email" />
                                    <x-input-error for="email" />
                                </div>

                                <div class="mb-3">
                                    <x-label for="password" value="{{ __('Password') }}" />
                                    <x-input id="password" type="password" name="password" required
                                        autocomplete="new-password" placeholder="Entrer votre mot de passe" />
                                    <x-input-error for="password" />
                                </div>

                                <div class="mb-3">
                                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-input id="password_confirmation" type="password" name="password_confirmation"
                                        required autocomplete="new-password" placeholder="Confirmez mot de passe" />
                                </div>

                                <div class="mb-6">
                                    <x-label for="role" value="{{ __('Type de compte') }}" />

                                    <div class="flex gap-4">

                                        <!-- Candidat -->
                                        <div class="w-1/2">
                                            <label for="candidate"
                                                class="flex items-center justify-between p-4 transition bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:bg-blue-50">
                                                <span class="text-base font-medium text-gray-800">
                                                    Candidat <br>
                                                    <small class="text-sm text-gray-400 font-base">Pour postuler</small>
                                                </span>

                                                <span>
                                                    <input type="radio" name="role" id="candidate" checked value="candidate" class="peer" />
                                                </span>
                                            </label>
                                        </div>

                                        <!-- Entreprise -->
                                        <div class="w-1/2">
                                            <label for="company"
                                                class="flex items-center justify-between p-4 transition bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:bg-blue-50">
                                                <span class="text-base font-medium text-gray-800">
                                                    Entreprise <br>
                                                    <small class="text-sm text-gray-400 font-base">Pour engager</small>
                                                </span>

                                                <span>
                                                    <input type="radio" name="role" id="company" value="prospect" class="peer" />
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ms-2">
                                                J'accèpte
                                                <a target="_blank" href="#!"
                                                    class="text-sm text-gray-600 underline rounded-md dark:text-slate-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    les conditions d'utilisation et de confidentialité
                                                </a>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="mt-5">
                                    <button type="submit"
                                        class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                        Créer un compte
                                    </button>
                                </div>
                            </form>

                            <div class="mt-10 text-center">
                                <p class="mb-0 text-slate-500 dark:text-zink-200">Avez-vous déjà un compte ? <a
                                        href="{{ route('login') }}"
                                        class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">Se
                                        connecter</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-2 mt-2 mb-2 border-none shadow-none lg:col-span-7 card bg-white/60 dark:bg-zink-500/60">
                    <div class="!px-10 !pt-10 h-full !pb-0 card-body flex flex-col">
                        <div class="flex items-center justify-between gap-3">
                            <div class="grow">
                                <a href="{{ url('index') }}">
                                    <x-application-logo />
                                </a>
                            </div>
                            <div class="shrink-0">
                                <x-language />
                            </div>
                        </div>
                        <div class="mt-auto">
                            <img src="{{ URL::asset('build/images/auth/img-01.png') }}" alt=""
                                class="md:max-w-[32rem] mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
