@extends('base')
@section('title', 'FAQ')

@section('body')
<!-- ============================ Page Title ================================== -->
<section class="bg-primary">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-xl-6 col-lg-6 col-md-7">
                <div class="fpc-capstion">
                    <div class="fpc-captions">
                        <h2 class="text-warning">Foire aux questions</h2>
                        <p class="subtitle text-light">Il arrive que des candidats, partenaires ou entreprises aient des questions sur notre plateforme de recrutement.</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="faqImage">
                    <img src="{{ asset('assets-2/img/faq.png') }}" class="img-fluid" alt="Image">
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Page Title ================================== -->

<!-- ============================ FAQ's Section ================================== -->
<section>
    <div class="container">

        <div class="row align-items-start">
            <div class="mt-4 col-xl-10 col-lg-12 col-md-12">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="border accordion-item">
                        <h2 class="accordion-header rounded-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                How do I close my account?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or corporate
                                clients corder a publication to be made and presented with the actual content still not being ready.
                                Think of a news blog that's filled with content hourly on the day of going live. However, reviewers
                                tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the
                                internet. The are likely to focus on the text, disregarding the layout and its elements.</div>
                        </div>
                    </div>
                    <div class="border accordion-item rounded-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Does Envato Elements Offer a Free Trial?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or corporate
                                clients corder a publication to be made and presented with the actual content still not being ready.
                                Think of a news blog that's filled with content hourly on the day of going live. However, reviewers
                                tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the
                                internet. The are likely to focus on the text, disregarding the layout and its elements.</div>
                        </div>
                    </div>
                    <div class="border accordion-item rounded-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Can I Use a Download Manager?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or corporate
                                clients corder a publication to be made and presented with the actual content still not being ready.
                                Think of a news blog that's filled with content hourly on the day of going live. However, reviewers
                                tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the
                                internet. The are likely to focus on the text, disregarding the layout and its elements.</div>
                        </div>
                    </div>
                    <div class="border accordion-item rounded-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Can I get a refund on Envato Elements?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or corporate
                                clients corder a publication to be made and presented with the actual content still not being ready.
                                Think of a news blog that's filled with content hourly on the day of going live. However, reviewers
                                tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the
                                internet. The are likely to focus on the text, disregarding the layout and its elements.</div>
                        </div>
                    </div>
                    <div class="border accordion-item rounded-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Why can’t I subscribe to Envato Elements from India?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or corporate
                                clients corder a publication to be made and presented with the actual content still not being ready.
                                Think of a news blog that's filled with content hourly on the day of going live. However, reviewers
                                tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the
                                internet. The are likely to focus on the text, disregarding the layout and its elements.</div>
                        </div>
                    </div>
                    <div class="border accordion-item rounded-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                What is the difference between Envato Elements subscription
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or corporate
                                clients corder a publication to be made and presented with the actual content still not being ready.
                                Think of a news blog that's filled with content hourly on the day of going live. However, reviewers
                                tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the
                                internet. The are likely to focus on the text, disregarding the layout and its elements.</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- ============================ FAQ's Section End ================================== -->
@endsection
