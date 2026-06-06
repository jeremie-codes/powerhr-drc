@extends('base')
@section('title', 'A propos de nous')

@section('body')
<!-- ============================ Page Title ================================== -->
<section class="bg-cover position-relative" style="background:url({{ asset('assets-2/img/about.png') }})no-repeat;" data-overlay="5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-7 col-lg-9 col-md-12">

                <div class="my-4 text-center fpc-capstion">
                    <div class="fpc-captions">
                        <h1 class="xl-heading text-warning">A propos de nous</h1>
                        <p class="text-light">La meilleure plaforme de travail en RDC</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title ================================== -->


<!-- ============================ blockquote ================================== -->
<section class="pb-0">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-9 col-lg-11 col-md-12">
                <div class="text-center">
                    <div class="fw-medium text-uppercase text-primary">NOTRE MISSION</div>
                    <blockquote>« Notre objectif est de créer des opportunités significatives qui permettent aux individus d'améliorer leur vie. Cette vision nous a amenés à devenir une plateforme mondiale où des entreprises de toutes tailles et des professionnels du monde entier se réunissent pour obtenir des résultats extraordinaires. »</blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="fpc-banner"></div>
</section>
<!-- ============================ blockquote ================================== -->


<!-- ============================= Join Us Section Start =============================== -->
<section>
    <div class="container">

        <div class="row align-items-center justify-content-between g-4">

            <div class="col-xl-5 col-lg-6 col-md-12">
                <div class="servicesTags">

                    <div class="mb-4 headingBloc d-block">
                        <h3 class="fw-semibold">Join Jobhill & Get Your Dream Job Today</h3>
                    </div>

                    <div class="mb-4 d-block">
                        <p>Websites in professional use templating systems. Commercial publishing platforms and content management systems ensure that you can show different text, different data using the same template.</p>
                        <p>This is quite a problem to solve, but just doing without greeking text won't fix it. Using test items of real content and data in designs will help, but there's no guarantee that every oddity will be found and corrected.</p>
                    </div>

                    <div class="mb-4 d-block">
                        <ul class="p-0 row g-4">

                            <li class="col-md-6">
                                <div class="singleiconList">
                                    <i class="bi bi-check-circle-fill icon text-success"></i>
                                    <p>Project Done Successfully</p>
                                </div>
                            </li>

                            <li class="col-md-6">
                                <div class="singleiconList">
                                    <i class="bi bi-check-circle-fill icon text-success"></i>
                                    <p><mark class="ctr">200</mark>k Jobs available</p>
                                </div>
                            </li>

                            <li class="col-md-6">
                                <div class="singleiconList">
                                    <i class="bi bi-check-circle-fill icon text-success"></i>
                                    <p><mark class="ctr">18</mark> Winning All Awards</p>
                                </div>
                            </li>

                            <li class="col-md-6">
                                <div class="singleiconList">
                                    <i class="bi bi-check-circle-fill icon text-success"></i>
                                    <p><mark class="ctr">50000</mark>+ Satisfy Talents</p>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <div class="gap-3 d-flex align-items-center justify-content-start">
                        <a href="#" class="px-5 btn btn-primary btn-more rounded-pill fw-medium">Create An Account</a>
                    </div>

                </div>
            </div>

            <div class="col-xl-5 col-lg-6 col-md-12">
                <div class="row g-4">

                    <div class="col-6">
                        <div class="cardCounter pe-2">
                            <div class="shadow-sm card">
                                <div class="icons"><i class="bi bi-patch-check text-success"></i></div>
                                <div class="caption">
                                    <h2 class="title"><span class="ctr text-success">22</span>k</h2>
                                    <p>Active Talents</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="cardCounter pe-2">
                            <div class="shadow-sm card">
                                <div class="icons"><i class="bi bi-shield-check text-warning"></i></div>
                                <div class="caption">
                                    <h2 class="title"><span class="ctr text-warning">22</span>k</h2>
                                    <p>Winning Award</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="cardCounter ps-2">
                            <div class="shadow-sm card">
                                <div class="icons"><i class="bi bi-wallet2 text-info"></i></div>
                                <div class="caption">
                                    <h2 class="title"><span class="ctr text-info">22</span>k</h2>
                                    <p>Active Jobs</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="cardCounter ps-2">
                            <div class="shadow-sm card">
                                <div class="icons"><i class="bi bi-emoji-laughing text-acent"></i></div>
                                <div class="caption">
                                    <h2 class="title"><span class="ctr text-acent">22</span>k</h2>
                                    <p>Happy Employees</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    </section>
    <!-- =============================== Join Us Section Start ============================== -->



<!-- ============================ Video Helps End ================================== -->
<section class="bg-cover" style="background:url({{ asset('images/abou.jpeg') }})no-repeat;" data-overlay="5">
    <div class="ht-150"></div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="text-center video-play-wrap">
                    <div class="video-play-btn d-flex align-items-center justify-content-center">
                        <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-bs-toggle="modal" data-bs-target="#popup-video" class="bg-white square--90 circle fs-2 text-primary"><i class="fa-solid fa-play"></i></a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="ht-150"></div>
</section>
<!-- ============================ Video Helps End ================================== -->


<!-- ============================ Our facts End ================================== -->
<section class="py-4 gray">
    <div class="container">
        <div class="row align-items-center justify-content-between g-4">

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="urfacts-wrap d-flex align-items-center justify-content-center">
                    <div class="flex-shrink-0 urfacts-first">
                        <h3 class="mb-0 fs-1 fw-medium text-primary"><span class="ctr">50</span>+</h3>
                    </div>
                    <div class="urfacts-caps ps-3">
                        <p class="mb-0 text-muted-2 lh-base">Total<br>Employees</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="urfacts-wrap d-flex align-items-center justify-content-center">
                    <div class="flex-shrink-0 urfacts-first">
                        <h3 class="mb-0 fs-1 fw-medium text-primary"><span class="ctr">80</span>+</h3>
                    </div>
                    <div class="urfacts-caps ps-3">
                        <p class="mb-0 text-muted-2 lh-base">Current<br>Active Project</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="urfacts-wrap d-flex align-items-center justify-content-center">
                    <div class="flex-shrink-0 urfacts-first">
                        <h3 class="mb-0 fs-1 fw-medium text-primary"><span class="ctr">20</span>K</h3>
                    </div>
                    <div class="urfacts-caps ps-3">
                        <p class="mb-0 text-muted-2 lh-base">Happly<br>Customers</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="urfacts-wrap d-flex align-items-center justify-content-center">
                    <div class="flex-shrink-0 urfacts-first">
                        <h3 class="mb-0 fs-1 fw-medium text-primary"><span class="ctr">45</span></h3>
                    </div>
                    <div class="urfacts-caps ps-3">
                        <p class="mb-0 text-muted-2 lh-base">Countries<br>We Work</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Our facts End ================================== -->


<!-- ================================ Our Team Start ======================================= -->
<section>
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                <div class="moder-heading">
                    <div class="subtitleHeading-wrap">
                        <h6 class="subtitle-heading">Nos héros</h6>
                    </div>
                    <h2 class="main-heading">Faites la connaissance de notre équipe dévouée</h2>
                </div>
            </div>
        </div>


        <div class="row justify-content-center g-xl-5 g-4">

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="teamBlock">
                    <div class="teamThumb">
                        <img src="{{ asset('assets/images/user.png') }}" class="img-fluid circle" alt="Team Name">
                        <div class="teamSocial">
                            <ul>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="caps">
                        <h4 class="title">Samuel Bishop</h4>
                        <p class="subtitle">Co-Founder</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="teamBlock">
                    <div class="teamThumb">
                        <img src="{{ asset('assets/images/user.png') }}" class="img-fluid circle" alt="Team Name">
                        <div class="teamSocial">
                            <ul>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="caps">
                        <h4 class="title">Emma Watson</h4>
                        <p class="subtitle">Team manager</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="teamBlock">
                    <div class="teamThumb">
                        <img src="{{ asset('assets/images/user.png') }}" class="img-fluid circle" alt="Team Name">
                        <div class="teamSocial">
                            <ul>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="caps">
                        <h4 class="title">Allen Smith</h4>
                        <p class="subtitle">UI/UX Designer</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="teamBlock">
                    <div class="teamThumb">
                        <img src="{{ asset('assets/images/user.png') }}" class="img-fluid circle" alt="Team Name">
                        <div class="teamSocial">
                            <ul>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#" class="socialLink"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="caps">
                        <h4 class="title">Allen Smith</h4>
                        <p class="subtitle">UI/UX Designer</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ================================ Article Section Start ======================================= -->


<!-- ============================ Users Reviews Start ================================== -->
<section class="bg-light">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="smart-heading-wrap">
                    <div class="smart-heading">
                        <h2 class="main-heading">La confiance de nos clients et partenaires</h2>
                        <div class="subtitleHeading-wrap">
                            <h6 class="subtitle-heading">Meilleurs avis de nos clients</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <div class="reviews_slider">

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">Absolutely love Jobhill! whenever I'm in need of finding a job, Jobhill is my #1 go to! wouldn't look anywhere else.</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">I love this app, and service, it makes applying for job so much easier you can make your resume as easy as filling out an application...</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">Jobhill the best job finder app out there right now.. they also protect you from spammers so the only emails I get due to...</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">I love this Jobhill app. it's more legit than the other ones with advertisement. Once I uploaded my resume, then employers...</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="singleItem">
                        <div class="reviewsCard">
                            <div class="reviewsBody">

                                <div class="reviews-topHeader">
                                    <div class="reviewsStar">
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                        <span class="star fill"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="revws-desc">
                                        <h5 class="reviewsTitle">"One of the Superb Platform"</h5>
                                        <p class="text">Overall, the Jobhill application is a powerful tool for anyone in the job market. Its reliability, extensive job listings, and user-friendly..</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
<!-- ============================ Users Reviews End ================================== -->


<!-- ============================ Explore Job By Location Start ================================== -->
<section>
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                <div class="moder-heading">
                    <div class="subtitleHeading-wrap">
                        <h6 class="subtitle-heading">Publications récentes</h6>
                    </div>
                    <h2 class="main-heading">Nos derniers postes</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="location_slider">

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-16.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-1.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-6.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-3.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-2.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-4.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-5.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-7.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-8.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-9.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-10.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-12.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-13.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-14.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-15.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-18.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-19.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-20.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Item -->
                            <div class="singleItem">
                                <div class="cardCities cursor rounded-4">
                                    <div class="cardCities-image ratio ratio-5">
                                        <img src="{{ asset('assets-2/img/brand/blog-21.jpeg') }}" class="img-fluid object-fit" alt="image">
                                    </div>

                                    <div class="px-4 py-4 text-center citiesCard-content d-flex flex-column justify-content-between">
                                        <div class="cardCities-bg"></div>
                                        <div class="citiesCard-topcaps"></div>
                                        <div class="citiesCard-bottomcaps">
                                            <button class="btn btn-whitener rounded-pill full-width">Nous Contacter<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- ============================ Explore Job By Location End ================================== -->
@endsection
