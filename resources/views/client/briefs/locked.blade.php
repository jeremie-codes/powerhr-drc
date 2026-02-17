@extends('layouts.app')

@section('content')
    {{-- body main --}}
    <div class="dashboard-main-body nft-page">
        {{-- breacrumbs --}}
        <div class="flex-wrap gap-3 mb-24 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Brief initial client</h6>
            <ul class="gap-2 d-flex align-items-center">
                <li class="fw-medium">
                    <a href="{{ route('candidate.index') }}" class="gap-1 d-flex align-items-center hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="text-lg icon"></iconify-icon>
                        Tableau de bord
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Contrat</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="p-40 text-center card radius-12">
            <h6 class="text-danger">Profil entreprise incomplet</h6>
            <p>Vous devez compléter le profil de votre entreprise avant de soumettre un contrat.</p>

            <a href="{{ route('client.profile.index') }}" class="btn btn-primary">
                Compléter le profil entreprise
            </a>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    // ======================== Upload Image Start =====================
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#avatar").change(function() {
        readURL(this);
    });
    // ======================== Upload Image End =====================
</script>
@endsection
