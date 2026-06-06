@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">
                {{ isset($profile) ? "Modifier le candidat" : 'Créer un candidat' }}
            </h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('candidate.index', ['locale' => app()->getLocale()]) }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Candidats
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">
                    {{ isset($profile) ? 'Edition' : 'Création' }}
                </li>
            </ul>
        </div>

        {{-- content --}}
        <div class="p-0 overflow-hidden card h-100 radius-12">
            <div class="p-40 card-body">
                <form action="{{ route('admin.candidates.store') }}" method="POST">
                    @csrf

                    @isset($profile)
                        <input type="hidden" name="user_id" value="{{ $profile->id }}">
                    @endisset

                    <div class="row">
                         <h6 class="text-md">Informations d'accès</h6>

                        {{-- Nom de l'utilisateur --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Nom complet de l'utilisateur <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control radius-8"
                                    value="{{ old('username', $profile->name ?? '') }} " required>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control radius-8"
                                    value="{{ old('email', $profile->email ?? '') }}" required>
                            </div>
                        </div>

                        @if(!isset($profile))
                        {{-- Password --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Mot de passe <span class="text-danger">*</span> | Minimum 8 caractères</label>
                                <input type="password" name="password" class="form-control radius-8" required>
                            </div>
                        </div>

                        {{-- Password Confirmation --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control radius-8" required>
                            </div>
                        </div>
                        @endif

                        {{-- Role --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Status profile <span class="text-danger">*</span></label>

                                <select name="role" class="form-select radius-8" required onchange="toggleEmployerField(this)">
                                    <option selected value="candidate" {{ old('role', $profile->role ?? '') == 'candidate' ? 'selected' : '' }}>Candidat</option>
                                    <option value="employee" {{ old('role', $profile->role ?? '') == 'employee' ? 'selected' : '' }}>Employé(e)</option>
                                </select>
                            </div>
                        </div>

                        {{-- Pays --}}
                        <div class="col-md-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">Pays de résidence <span class="text-danger">*</span></label>

                                <select name="residence_id" class="form-select radius-8" required>

                                    <option value="">-- Choisir --</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }} "
                                            {{ old('residence_id', $profile->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        {{-- Employer --}}
                        <div class="col-md-6 {{ $profile->candidate?->employed_at ? 'd-block': 'd-none' }}" id="employer-field">
                            <div class="mb-20">
                                <label class="form-label fw-semibold">
                                    Employeur <span class="text-danger">*</span>
                                    <br>
                                    <small class="text-danger {{ $profile->candidate?->employedAt ? 'd-none': 'd-block' }}">Si vous changer le status du profil à Employé(e), le candidat s'affichera dans la liste des employé(e)s </small>
                                    <small class="text-danger {{ $profile->candidate?->employedAt ? 'd-block': 'd-none' }}">Si vous changer le status du profil à Candidat, le candidat s'affichera dans la liste des candidats </small>
                                </label>

                                <select name="employed_at" class="form-select radius-8">

                                    <option value="">-- Choisir --</option>

                                    @foreach ($employers as $employer)
                                        <option value="{{ $employer->id }} "
                                            {{ old('employed_at', $profile->candidate?->employed_at ?? '') == $employer->id ? 'selected' : '' }}>
                                            {{ $employer->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <hr class="my-3">

                        <h6 class="mt-2 text-md">Informations Personnelles</h6>

                        {{-- Job Type --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Votre métier</label>
                                <input type="text" name="job_type" class="form-control radius-8" placeholder="Ex: Développeur Web, Designer Graphique, etc."
                                    value="{{ old('job_type', $profile->candidate?->job_type ?? '') }}">
                            </div>
                        </div>

                        {{-- Qualification Level --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Niveau d'étude</label>

                                <select name="qualification_level" class="form-select radius-8">
                                    <option value="Bac"
                                        {{ old('qualification_level', $profile->candidate?->qualification_level ?? '') == 'Bac' ? 'selected' : '' }}>
                                        Bac (Baccalauréat, Diplôme d'état)
                                    </option>
                                    <option value="Graduat"
                                        {{ old('qualification_level', $profile->candidate?->qualification_level ?? '') == 'Graduat' ? 'selected' : '' }}>
                                        Graduat
                                    </option>
                                    <option value="Licencie"
                                        {{ old('qualification_level', $profile->candidate?->qualification_level ?? '') == 'Licencie' ? 'selected' : '' }}>
                                        Licencie
                                    </option>
                                    <option value="master"
                                        {{ old('qualification_level', $profile->candidate?->qualification_level ?? '') == 'master' ? 'selected' : '' }}>
                                        Master
                                    </option>
                                    <option value="doctorate"
                                        {{ old('qualification_level', $profile->candidate?->qualification_level ?? '') == 'doctorate' ? 'selected' : '' }}>
                                        Doctorat
                                    </option>
                                    <option value="autre"
                                        {{ old('qualification_level', $profile->candidate?->qualification_level ?? '') == 'autre' ? 'selected' : '' }}>
                                        Autre
                                    </option>
                                </select>
                            </div>
                        </div>

                        {{-- Years Experience --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Années d'expérience</label>
                                <input type="number" name="years_experience" class="form-control radius-8"
                                    value="{{ old('years_experience', $profile->candidate?->years_experience ?? '') }}">
                            </div>
                        </div>

                        {{-- Salary --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Salaire souhaité</label>
                                <input type="number" step="0.01" name="salary_expectation"
                                    class="form-control radius-8"
                                    value="{{ old('salary_expectation', $profile->candidate?->salary_expectation ?? '') }}">
                            </div>
                        </div>

                        {{-- Experiences --}}
                        <h6 class="mt-4 text-md">Expériences</h6>
                        <div id="experiences-wrapper"></div>
                        <div>
                            <button type="button" class="mb-3 btn btn-sm btn-success align-items-start" onclick="addExperience()">
                                + Ajouter une expérience
                            </button>
                        </div>

                        {{-- Educations --}}
                        <h6 class="mt-4 text-md">Formations</h6>
                        <div id="educations-wrapper"></div>
                        <div>
                            <button type="button" class="mb-3 btn btn-sm btn-success" onclick="addEducation()">
                                + Ajouter une formation
                            </button>
                        </div>

                        {{-- Skills --}}
                        <h6 class="mt-4 text-md">Compétences</h6>
                        <div id="skills-wrapper"></div>
                        <div>
                            <button type="button" class="mb-3 btn btn-sm btn-success" onclick="addSkill()">
                                + Ajouter une compétence
                            </button>
                        </div>

                        {{-- Languages --}}
                        <h6 class="mt-4 text-md">Langues parlées</h6>
                        <div id="languages-wrapper"></div>
                        <div>
                            <button type="button" class="mb-3 btn btn-sm btn-success" onclick="addLanguage()">
                                + Ajouter une langue
                            </button>
                        </div>

                        <div class="gap-3 mt-24 d-flex justify-content-center">
                            <button type="submit" class="px-24 py-12 btn btn-primary radius-8">
                                {{ isset($profile->candidate) ? 'Mettre à jour' : 'Créer le profil' }}
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
{{-- Experiences --}}
<script>
    let experienceIndex = 0;

    window.addExperience = function(data = null) {

        const wrapper = document.getElementById('experiences-wrapper');

        const html = `
            <div class="p-3 mb-3 border rounded row position-relative experience-item">
                <div>
                    <button type="button" class="top-0 btn btn-danger btn-sm position-absolute end-0"
                    onclick="this.parentElement.parentElement.remove()">X</button>
                </div>

                <div class="col-md-3">
                    <input type="text" name="experiences[${experienceIndex}][company_name]"
                        class="mb-2 form-control"
                        placeholder="Entreprise"
                        value="${data?.company_name ?? ''}">

                </div>

                <div class="col-md-3">
                    <input type="text" name="experiences[${experienceIndex}][position]"
                        class="mb-2 form-control col-md-2"
                        placeholder="Poste"
                        value="${data?.position ?? ''}">
                </div>

                <div class="col-md-3">
                    <input type="date" name="experiences[${experienceIndex}][start_date]"
                        class="mb-2 form-control col-md-2"
                        value="${data?.start_date ?? ''}">
                </div>

                <div class="col-md-3">
                    <input type="date" name="experiences[${experienceIndex}][end_date]"
                        class="mb-2 form-control col-md-2"
                        value="${data?.end_date ?? ''}">
                </div>

                <div class="col-12">
                    <textarea name="experiences[${experienceIndex}][tasks]"
                        class="form-control"
                        placeholder="Tâches">${data?.tasks ?? ''}</textarea>
                </div>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);

        experienceIndex++;
    }
</script>

{{-- Educations --}}
<script>
    let educationIndex = 0;

    function addEducation(data = null) {

        const wrapper = document.getElementById('educations-wrapper');

        const html = `
            <div class="p-3 mb-3 border rounded row position-relative education-item">
                <div>
                    <button type="button" class="top-0 btn btn-danger btn-sm position-absolute end-0"
                    onclick="this.parentElement.parentElement.remove()">X</button>
                </div>

                <div class="col-md-3">
                    <input type="text" name="educations[${educationIndex}][school]"
                        class="mb-2 form-control"
                        placeholder="École ou centre de formation"
                        value="${data?.school ?? ''}">
                </div>

                <div class="col-md-3">
                <input type="text" name="educations[${educationIndex}][degree]"
                    class="mb-2 form-control"
                    placeholder="Diplôme d'état (Bac), Graduat, etc."
                    value="${data?.degree ?? ''}">
                </div>

                <div class="col-md-3">
                    <input type="date" name="educations[${educationIndex}][start_date]"
                    class="mb-2 form-control"
                    value="${data?.start_date ?? ''}">
                </div>

                <div class="col-md-3">
                    <input type="date" name="educations[${educationIndex}][end_date]"
                        class="mb-2 form-control"
                        value="${data?.end_date ?? ''}">
                </div>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);

        educationIndex++;
    }
</script>

{{-- Skills --}}
<script>
    function addSkill(value = '') {

        const wrapper = document.getElementById('skills-wrapper');

        const html = `
            <div class="mb-2 d-flex">
                <input type="text" name="skills[]"
                    class="form-control me-2"
                    placeholder="Compétence"
                    value="${value}">
                <button type="button" class="btn btn-danger"
                    onclick="this.parentElement.remove()">X</button>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
    }
</script>

{{-- Languages --}}
<script>
    function addLanguage(value = '') {

        const wrapper = document.getElementById('languages-wrapper');

        const html = `
            <div class="mb-2 d-flex">
                <input type="text" name="languages[]"
                    class="form-control me-2"
                    placeholder="Langue"
                    value="${value}">
                <button type="button" class="btn btn-danger"
                    onclick="this.parentElement.remove()">X</button>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
    }
</script>

{{-- toggle show Employer Field --}}
<script>
    window.toggleEmployerField = function (el) {
        const employerField = document.getElementById('employer-field');

        if(el.value === 'employee') {
            el.setAttribute('required', 'required');
            employerField.classList.remove('d-none');
        } else {
            el.removeAttribute('required');
            employerField.classList.add('d-none');
        }
    }
</script>

{{-- Autofill form --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {

        @if(isset($profile->candidate))

            @foreach($profile->candidate?->experiences ?? [] as $exp)
                addExperience(@json($exp));
            @endforeach

            @foreach($profile->candidate?->educations ?? [] as $edu)
                addEducation(@json($edu));
            @endforeach

            @foreach($profile->candidate?->skills ?? [] as $skill)
                addSkill("{{ $skill->skill_name }}");
            @endforeach

            @foreach($profile->candidate?->languages ?? [] as $lang)
                addLanguage("{{ $lang->language_name }}");
            @endforeach

        @endif

    });
</script>
@endsection
