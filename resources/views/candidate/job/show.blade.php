@extends('layouts.app')

@section('content')
<div class="dashboard-main-body nft-page">
    <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
        <h6 class="mb-0 fw-semibold">Détails de l'offres</h6>
        <ul class="gap-2 d-flex align-items-center">
            <li class="fw-medium">
            <a href="{{ route('candidate.jobs.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                <iconify-icon icon="mdi:briefcase-outline" class="text-lg menu-icon"></iconify-icon>
                Liste d'offres
            </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Détails</li>
        </ul>
    </div>

</div>

<div class="row justify-content-center" id="invoice">
    <div class="col-lg-8">
        <div class="bg-white border shadow-4 radius-8">

            {{-- HEADER --}}
            <div class="flex-wrap gap-3 p-20 d-flex justify-content-between border-bottom">
                <div>
                    <h3 class="text-xl">{{ $jobOffer->title }}</h3>
                    <p class="mb-1 text-sm">
                        Publiée le : {{ $jobOffer->created_at->format('d/m/Y') }}
                    </p>
                    <p class="mb-0 text-sm">
                        Expire le :
                        {{ $jobOffer->expires_at
                            ? \Carbon\Carbon::parse($jobOffer->expires_at)->format('d/m/Y')
                            : 'Non défini' }}
                    </p>
                </div>

                <div style="text-align: right">
                    <h6 class="mb-8">
                        {{-- {{ $jobOffer->client->company->name ?? 'Entreprise' }} --}}
                        PowerHR-DRC
                    </h6>
                    <p class="mb-1 text-sm">
                        {{-- {{ $jobOffer->client->company->address ?? '-' }} --}}
                        Croisement des avenue Kabalo & Mushi, Kinshasa
                    </p>
                    <p class="mb-0 text-sm">
                        {{-- {{ $jobOffer->client->company->email_hr ?? $jobOffer->client->email }} --}}
                        contact@powerhr-drc.com
                    </p>
                </div>
            </div>

            {{-- BODY --}}
            <div class="px-20 py-28">

                {{-- Infos principales --}}
                <div class="flex-wrap gap-3 d-flex justify-content-between align-items-end">
                    <div>
                        <h6 class="text-md">Détails du poste :</h6>
                        <table class="text-sm text-secondary-light">
                            <tbody>
                                <tr>
                                    <td>Localisation</td>
                                    <td class="ps-8">: {{ $jobOffer->location }}</td>
                                </tr>
                                <tr>
                                    <td>Contrat</td>
                                    <td class="ps-8">: {{ $jobOffer->contract_type ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Expérience</td>
                                    <td class="ps-8">
                                        : {{ $jobOffer->experience_years
                                            ? $jobOffer->experience_years . ' ans'
                                            : 'Non précisée' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <table class="text-sm text-secondary-light">
                            <tbody>
                                <tr>
                                    <td>Salaire</td>
                                    <td class="ps-8">
                                        : {{ $jobOffer->salary
                                            ? number_format($jobOffer->salary, 0, ',', ' ') . ' ' . $jobOffer->currency
                                            : 'Non communiqué' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Statut</td>
                                    <td class="ps-8">
                                        : {{ $jobOffer->is_active ? 'Active' : 'Inactive' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Candidatures</td>
                                    <td class="ps-8">
                                        : {{ $jobOffer->applications->count() }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                <div class="mt-24">
                    <h6>Description du poste</h6>
                    <div class="p-16 text-sm border rounded">
                        {!! nl2br(e($jobOffer->description)) !!}
                    </div>
                </div>

                {{-- BOUTON POSTULER --}}
                <div class="mt-24 text-center">

                    @if(!$hasApplied)
                        <form action="{{ route('candidate.jobs.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="job_offer_id" value="{{ $jobOffer->id }}">
                            <button class="btn btn-primary">
                                Postuler maintenant
                            </button>
                        </form>
                    @else
                        <button class="btn btn-success" disabled>
                            Candidature déjà soumise
                        </button>
                    @endif

                </div>

                {{-- FOOTER --}}
                <div class="mt-24">
                    <p class="text-sm text-center text-secondary-light fw-semibold">
                        Merci pour votre intérêt !
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
