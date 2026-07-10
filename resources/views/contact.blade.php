@extends('base')
@section('title', 'Contactez-nous')

@section('body')
<!-- ============================ Page Title ================================== -->
<section class="bg-cover position-relative" style="background:url({{ asset('assets-2/img/about.png') }})no-repeat;" data-overlay="5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-7 col-lg-9 col-md-12">

                <div class="my-4 text-center fpc-capstion">
                    <div class="fpc-captions">
                        <h1 class="xl-heading text-warning">Contactez-nous</h1>
                        <p class="text-light">Ne vous inquiétez pas, nous vous répondrons dans les plus bref délais</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title ================================== -->


<!-- ============================ Form Section ================================== -->
<section>
    <div class="container">

        <div class="mb-5 row justify-content-between g-4">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="p-4 text-center border-2 card rounded-4 br-dashed h-100">
                    <div class="mx-auto mb-3 crds-icons d-inline-flex text-primary fs-2">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="crds-desc">
                        <h5>Envoyez un mail</h5>
                        <p class="mb-0 fs-6 text-md lh-2">conseillercommercial1@powerhr-drc.com<br>conseillercommercial2@powerhr-drc.com</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="p-4 text-center border-2 card rounded-4 br-dashed h-100">
                    <div class="mx-auto mb-3 crds-icons d-inline-flex text-primary fs-2"><i class="fa-solid fa-headset"></i>
                    </div>
                    <div class="crds-desc">
                        <h5>Appelez-nous</h5>
                        <p class="mb-0 fs-6 text-md lh-2">(+243) 986 404 420</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="p-4 text-center border-2 card rounded-4 br-dashed h-100">
                    <div class="mx-auto mb-3 crds-icons d-inline-flex text-primary fs-2"><i class="fa-solid fa-globe"></i>
                    </div>
                    <div class="crds-desc">
                        <h5>Nos réseaux sociaux</h5>
                        <p class="text-md lh-2">Suivez nous via les réseaux sociaux</p>
                        <div class="mt-4 socialLinkwrap center gray">
                            <ul>
                                <li><a href="#" class="border socialLink border-primary"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="border socialLink border-primary"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="border socialLink border-primary"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" class="border socialLink border-primary"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-between g-4">

            <div class="col-xl-7 col-lg-7 col-md-12">
                <div class="p-4 border contactForm bg-light rounded-3" style="border: 0.5px solid #aaa; box-shadow: 0px 0px 5px #ccc">
                    <form>
                        <div class="row align-items-center">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="mb-4 touch-block d-flex flex-column">
                                    <h2>Écrivez-nous</h2>
                                    <p>Contactez-nous via le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Votre Nom</label>
                                    <input style="border: 0.5px solid #ccc" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">E-Mail</label>
                                    <input style="border: 0.5px solid #ccc" type="email" class="form-control">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Numéro de téléphone</label>
                                    <input style="border: 0.5px solid #ccc" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Sujet</label>
                                    <input style="border: 0.5px solid #ccc" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Votre Message</label>
                                    <textarea style="border: 0.5px solid #ccc" class="form-control ht-120"></textarea>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="mb-0 form-group">
                                    <button type="button" class="btn fw-medium btn-primary">Envoyer Message
                                        <i class="fa-solid fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12">
                <iframe class="border rounded full-width ht-100 grayscale" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248.65397380129357!2d15.301383555455475!3d-4.323671693290247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a6a31115cff5e93%3A0x825656451d2d7345!2sPowerHR!5e0!3m2!1sfr!2scd!4v1783694862495!5m2!1sfr!2scd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
{{-- https://maps.app.goo.gl/eiaJgmVkGFCbPi8u8 --}}
        </div>

    </div>
</section>
<!-- ============================ Form Section End ================================== -->
@endsection
