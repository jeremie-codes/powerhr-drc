@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Profil candidat</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('client.candidate.recommended') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:user-group-outline" class="text-lg icon"></iconify-icon>
                        Profile recommandés
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Profil candidat</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="card">
            <div class="card-header">
                <div class="flex-wrap gap-2 d-flex align-items-center justify-content-end">
                    <a href="javascript:void(0)" onclick="printInvoice()" class="gap-1 btn btn-sm btn-primary radius-8 d-inline-flex align-items-center">
                        <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
                        Télécharger
                    </a>

                    @if(!$Recommanded)
                        <form action="{{ route('client.candidate.recommended.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="candidate_id" value="{{ $profile->candidate?->id }}">
                            <button type="submit" href="javascript:void(0)" class="gap-1 btn btn-sm btn-success radius-8 d-inline-flex align-items-center">
                                <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
                                Récommander ce candidat
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="py-40 card-body">
                <div class="row justify-content-center" id="cv">
                    <div class="col-lg-8">
                        <div class="overflow-hidden border shadow-4 radius-8 d-flex" id="curriculum">

                            {{-- COLONNE GAUCHE --}}
                            <div class="p-20 text-white bg-primary-500" style="width:30%;">
                                <div class="mt-20 mb-24 text-center">
                                    <img src="{{ asset($profile->gender == 'masculin' ? 'assets/images/users/user1.png' : 'assets/images/users/user2.png') }}"
                                        class="border rounded-circle" width="150" height="150">
                                </div>

                                <h6 class="pb-2 mb-2 text-xl text-white text-uppercase border-bottom" >Coordonnées</h6>
                                <p class="mb-8 text-sm">
                                    {{ 'Téléphone: *** *** ***' }}<br>
                                    {{ 'Email: ******@***** ' }}<br>
                                    {{ 'Sexe: ' . ucfirst($profile->gender) }}<br>
                                    {{ 'Adresse : *******' }}, {{ $profile?->country?->code ?? '' }}<br>

                                </p>

                                <h6 class="pb-2 mt-20 mb-2 text-xl text-white text-uppercase border-bottom" >Compétences</h6>
                                <ul class="mb-0 text-sm" style="list-style-type: disc; padding-left: 20px;">
                                    @forelse($profile->candidate?->skills ?? [] as $skill)
                                        <li>{{ $skill->skill_name }}</li>
                                    @empty
                                        <li>Aucune compétence définie</li>
                                    @endforelse

                                </ul>

                                <h6 class="pb-2 mt-20 mb-2 text-xl text-white text-uppercase border-bottom" >Langues</h6>
                                <ul class="mb-0 text-sm" style="list-style-type: disc; padding-left: 20px;">
                                    @forelse($profile->candidate?->languages ?? [] as $lang)
                                        <li>
                                            {{ $lang->language_name }}
                                        </li>
                                    @empty
                                        <li>Aucune langue définie</li>
                                    @endforelse
                                </ul>
                            </div>

                            {{-- COLONNE DROITE --}}
                            <div class="p-24 bg-white" style="width:70%;">
                                <h5 class="mt-20 mb-0">Profil Anonyme</h5>

                                <h6 class="pb-2 mb-16 text-xl text-primary-500 border-bottom">
                                    {{ $profile->candidate->job_type ?? 'Métier non défini' }}
                                </h6>

                                {{-- PROFIL --}}
                                <h6 class="mt-16 text-xl fw-semibold">Profil professionnel</h6>
                                <p class="text-sm">
                                    {{ $profile->candidate->summary ?? 'Vous n\'avez pas décris de profil professionnel dans votre bio' }}
                                </p>

                                {{-- EXPERIENCES --}}
                                <h6 class="mt-24 text-xl fw-semibold">Parcours professionnel</h6>
                                @forelse($profile->candidate?->experiences ?? [] as $exp)
                                    <div class="mb-16">
                                        <strong>{{ $exp->position }}</strong><br>
                                        <span class="text-sm text-muted">
                                            {{ $exp->company_name }} —
                                            {{ \Carbon\Carbon::parse($exp->start_date)->format('m/Y') }}
                                            -
                                            {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('m/Y') : 'Présent' }}
                                        </span>
                                        <p class="mt-4 mb-0 text-sm">
                                            {{ $exp->tasks }}
                                        </p>
                                    </div>
                                @empty
                                    <p class="mb-0 text-sm text-muted">Aucune expérience professionnelle définie.</p>
                                @endforelse

                                {{-- EDUCATION --}}
                                <h6 class="mt-24 text-xl fw-semibold">Formation</h6>
                                @forelse($profile->candidate?->educations ?? [] as $edu)
                                    <div class="mb-12">
                                        <strong>{{ $edu->degree }}</strong><br>
                                        <span class="text-sm text-muted">
                                            {{ $edu->school }} —
                                            {{ \Carbon\Carbon::parse($edu->start_date)->format('Y') }}
                                            -
                                            {{ $edu->end_date ? \Carbon\Carbon::parse($edu->end_date)->format('Y') : 'Présent' }}
                                        </span>
                                    </div>
                                @empty
                                    <p class="mb-0 text-sm text-muted">Aucune formation définie.</p>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')
<script>
    function printInvoice() {
      var printContents = document.getElementById('curriculum').innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
    }
</script>
@endsection
