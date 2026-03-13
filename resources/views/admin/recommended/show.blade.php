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
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="overflow-hidden border user-grid-card position-relative radius-16 bg-base h-100">
                    <img src="{{ asset('assets/images/user-grid/user-grid-bg1.png') }}" alt="" class="w-100 object-fit-cover">
                    <div class="pb-24 mb-24 ms-16 me-16 mt--100">
                        <div class="text-center border border-top-0 border-start-0 border-end-0">
                            <img src="{{ asset($profile->image ? 'storage/' . $profile->image : 'build/images/users/avatar-1.png') }}" alt=""
                                 class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover bg-blue-light">

                            <h6 class="mt-16 mb-0">{{ $profile->name }}</h6>
                            <span class="mb-16 text-secondary-light">{{ $profile->email }}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="mb-16 text-xl">Information Personnelle</h6>
                            <ul>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Nom complet</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $profile->name ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $profile->email ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Pays</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $profile?->country->name ?? '--' }}</span>
                                </li>
                                <li class="gap-1 mb-12 d-flex align-items-center">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Langue</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $profile->langue ?? '--' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h6>
                            Entreprises intéressées
                        </h6>
                    </div>
                    <div class="p-24 card-body">
                        <div class="table-responsive scroll-sm">
                            <table class="table mb-0 bordered-table sm-table">
                                <thead>
                                <tr>
                                    <th scope="col">#N°</th>
                                    <th scope="col">Entreprise</th>
                                    <th scope="col">Profil</th>
                                    <th scope="col">Réponse</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($recommanded as $index => $client)
                                    <tr>
                                        <td>
                                            <div class="gap-10 d-flex align-items-center">
                                                {{ $index + 1 }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <a href="{{ $client->company ? route('admin.client.show', $client) : '#!' }}">
                                                        <span class="mb-0 text-md fw-semibold text-secondary-light">{{ $client->company?->name ?? '---' }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="mb-0 text-md fw-normal text-secondary-light">
                                                {{ $client->company->user->role ?? '---' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="mb-0 text-md fw-normal text-secondary-light">
                                                {{ $client->response ?? 'Non traitée' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="gap-10 d-flex align-items-center justify-content-center">
                                                <a href="{{ route('admin.client.show', $client) }}"
                                                   class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="majesticons:eye-line" class="text-xl icon"></iconify-icon>
                                                </a>

                                                @if(!$client->traited)
                                                <form action="{{ route('admin.candidate.recommended.validate', $client) }}" method="post">
                                                    @csrf
                                                    <button type="button" class="btn btn-primary-200 btn-hover-primary-200 rounded-5"
                                                        class="btn btn-primary btn-lg"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalId"
                                                    >
                                                        repondre
                                                    </button>


                                                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered"
                                                            role="document"
                                                        >
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-lg" id="modalTitleId">
                                                                        Répondre à la récommandation
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="icon-field has-validation">
                                                                        <label>
                                                                            Quelle est la disponibilité du candidat?
                                                                        </label>
                                                                        <select class="form-select" name="response">
                                                                            <option value="disponible">Disponible</option>
                                                                            <option value="occupé">Occupé</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button
                                                                        type="button"
                                                                        class="btn btn-secondary"
                                                                    >
                                                                        Annuler
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                @endif

                                                @if($client->traited)
                                                    <span class="px-24 py-4 text-sm border bg-neutral-200 text-neutral-600 border-neutral-400 radius-50 fw-medium">Traitée</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="flex-wrap gap-2 mt-24 d-flex align-items-center justify-content-between">
                            <span>
                                Showing {{ $recommanded->firstItem() }}
                                to {{ $recommanded->lastItem() ?? $recommanded->count() }}
                                of {{ $recommanded->total() }} entries
                            </span>

                            {{ $recommanded->links('vendor.pagination.custom') }}
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
