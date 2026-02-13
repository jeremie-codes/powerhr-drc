@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Mon Profil</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Profil</li>
            </ul>
        </div>

        <div class="px-24 mb-10 text-lg alert alert-primary bg-primary-50 text-primary-600 border-primary-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 py-13 fw-semibold radius-4 d-flex align-items-center justify-content-between" role="alert">
            <div class="gap-2 d-flex align-items-center">
                <iconify-icon icon="mdi:alert-circle-outline" class="text-xl icon"></iconify-icon>
                <small>Complétez votre profil pour maximiser vos chances de trouver un emploi.</small>
            </div>
            <button class="remove-button text-primary-600 text-xxl line-height-1"> <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
        </div>

        {{-- content --}}
        <div class="p-0 overflow-hidden card h-100 radius-12">
            <div class="p-40 card-body">
                <form action="{{ route('candidate.profile.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <h6 class="mt-4 text-md">Informations Personnelles</h6>

                        {{-- Job Type --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Votre métier</label>
                                <input type="text" name="job_type" class="form-control radius-8" placeholder="Ex: Développeur Web, Designer Graphique, etc."
                                    value="{{ old('job_type', auth()->user()->candidate?->job_type) }}">
                            </div>
                        </div>

                        {{-- Qualification Level --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Niveau d'étude</label>

                                <select name="qualification_level" class="form-select radius-8">
                                    <option value="Bac"
                                        {{ auth()->user()->candidate?->qualification_level == 'Bac' ? 'selected' : '' }}>
                                        Bac (Baccalauréat, Diplôme d'état)
                                    </option>
                                    <option value="Graduat"
                                        {{ auth()->user()->candidate?->qualification_level == 'Graduat' ? 'selected' : '' }}>
                                        Graduat
                                    </option>
                                    <option value="Licencie"
                                        {{ auth()->user()->candidate?->qualification_level == 'Licencie' ? 'selected' : '' }}>
                                        Licencie
                                    </option>
                                    <option value="master"
                                        {{ auth()->user()->candidate?->qualification_level == 'master' ? 'selected' : '' }}>
                                        Master
                                    </option>
                                    <option value="doctorate"
                                        {{ auth()->user()->candidate?->qualification_level == 'doctorate' ? 'selected' : '' }}>
                                        Doctorat
                                    </option>
                                    <option value="autre"
                                        {{ auth()->user()->candidate?->qualification_level == 'autre' ? 'selected' : '' }}>
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
                                    value="{{ old('years_experience', auth()->user()->candidate?->years_experience) }}">
                            </div>
                        </div>

                        {{-- Salary --}}
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="mb-8 form-label fw-semibold">Salaire souhaité</label>
                                <input type="number" step="0.01" name="salary_expectation"
                                    class="form-control radius-8"
                                    value="{{ old('salary_expectation', auth()->user()->candidate?->salary_expectation) }}">
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
                                Enregistrer
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

{{-- Autofill form --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {

        @foreach(auth()->user()->candidate->experiences as $exp)
            addExperience(@json($exp));
        @endforeach

        @foreach(auth()->user()->candidate->educations as $edu)
            addEducation(@json($edu));
        @endforeach

        @foreach(auth()->user()->candidate->skills as $skill)
            addSkill("{{ $skill->skill_name }}");
        @endforeach

        @foreach(auth()->user()->candidate->languages as $lang)
            addLanguage("{{ $lang->language_name }}");
        @endforeach

    });
</script>
@endsection
