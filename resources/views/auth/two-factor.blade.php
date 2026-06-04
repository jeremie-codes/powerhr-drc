@extends('auth.layouts.master')
@section('title')
    Two Factor Auth
@endsection
@section('content')
<body
    class="flex items-center justify-center min-h-screen px-4 py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">
    <div class="mb-0 border-none shadow-none xl:w-2/3 card bg-white/70 dark:bg-zink-500/70">
        <div class="grid grid-cols-1 gap-0 lg:grid-cols-12">
            <div class="lg:col-span-5">
                <div class="!px-12 !py-12 card-body h-full flex flex-col">

                    <div class="my-auto">
                        <div class="text-center">
                            <h3 class="mb-2 text-custom-500 dark:text-custom-500">Authentification a deux facteurs</h3>
                        </div>

                        <div x-data="{ recovery: false }">
                            <div class="mb-4 text-sm text-gray-600 dark:text-slate-400" x-show="! recovery">
                                {{ __('Veuillez confirmer votre mail en saisissant le code de 6 chiffres envoyé par mail : ') }} <span class="font-semibold text-custom-500 dark:text-custom-500">{{ $email }}</span>
                            </div>

                            <x-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('two-factor.login', $token) }}" onsubmit="disableBtn()">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">

                                <div class="mt-4" x-show="! recovery">
                                    <x-label for="otp" value="{{ __('Code OTP') }}" />

                                    <div class="flex gap-3" id="otp-container">
                                        {{-- On utilise name="otp[]" pour correspondre à ton contrôleur --}}
                                        <x-input class="block w-1/4 h-16 mt-1 text-center otp-input" type="text" inputmode="numeric" name="otp[]" autofocus maxlength="1" />
                                        <x-input class="block w-1/4 h-16 mt-1 text-center otp-input" type="text" inputmode="numeric" name="otp[]" maxlength="1" />
                                        <x-input class="block w-1/4 h-16 mt-1 text-center otp-input" type="text" inputmode="numeric" name="otp[]" maxlength="1" />
                                        <x-input class="block w-1/4 h-16 mt-1 text-center otp-input" type="text" inputmode="numeric" name="otp[]" maxlength="1" />
                                        <x-input class="block w-1/4 h-16 mt-1 text-center otp-input" type="text" inputmode="numeric" name="otp[]" maxlength="1" />
                                        <x-input class="block w-1/4 h-16 mt-1 text-center otp-input" type="text" inputmode="numeric" name="otp[]" maxlength="1" />
                                    </div>
                                </div>

                                <div class="flex items-center justify-center mt-4">
                                    <x-button id="submit-btn" class="w-full mt-4 ms-4" variant="green">
                                        {{ __('Confirmer') }}
                                    </x-button>
                                </div>
                            </form>

                            <div class="mt-4 text-center">
                                @if(!$otpIsValid)
                                <small class="text-red-400">
                                    Temps écoulé, veuillez renvoyer le code de vérification.
                                </small>
                                @endif

                                <form action="{{ route('two-factor.resend') }}" method="post" onsubmit="disableResendBtn()">
                                    @csrf

                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <div class="flex items-center justify-end">
                                        <x-button class="mt-4 " id="resend-btn">
                                            {{ __('Renvoyer le code') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.otp-input');

        inputs.forEach((input, index) => {
            // Gérer le copier-coller
            input.addEventListener('paste', function (e) {
                e.preventDefault();
                const data = e.clipboardData.getData('text').trim();
                // On vérifie si ce qu'on colle ressemble à un code
                if (!/^\d+$/.test(data)) return;

                const characters = data.split('');

                characters.forEach((char, i) => {
                    if (index + i < inputs.length) {
                        inputs[index + i].value = char;
                    }
                });

                // Focus le dernier champ rempli ou le suivant
                const nextIndex = Math.min(index + characters.length, inputs.length - 1);
                inputs[nextIndex].focus();
            });

            // Gérer la saisie manuelle (Auto-focus suivant)
            input.addEventListener('input', function (e) {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            // Gérer le retour arrière (Auto-focus précédent)
            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && e.target.value.length === 0 && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    });

    function disableBtn() {
        const btn = document.getElementById('submit-btn');

        // Désactive le bouton
        btn.disabled = true;

        // Ajoute un style visuel (optionnel selon ton CSS)
        btn.style.opacity = "0.5";
        btn.style.cursor = "not-allowed";

        // Change le texte pour rassurer l'utilisateur
        btn.innerText = "Validation en cours...";

        return true; // Important pour laisser le formulaire s'envoyer
    }

    function disableResendBtn() {
        const btn = document.getElementById('resend-btn');

        // Désactive le bouton
        btn.disabled = true;

        // Ajoute un style visuel (optionnel selon ton CSS)
        btn.style.opacity = "0.5";
        btn.style.cursor = "not-allowed";

        // Change le texte pour rassurer l'utilisateur
        btn.innerText = "Renvoi en cours...";

        return true; // Important pour laisser le formulaire s'envoyer
    }
    </script>
@endsection
