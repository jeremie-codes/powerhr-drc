<!doctype html>
<html lang="en" data-bs-theme="light">


	<!-- Mirrored from themezhub.net/jobhill-live-2/jobhill/home-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2026 13:18:04 GMT -->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title') - Power HR</title>
		<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

		<!-- Vendors Css -->
		<link href="{{ asset('assets-2/css/vendors.css') }}" rel="stylesheet">

		<!-- Icons CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Custom CSS -->
		<link href="{{ asset('assets-2/css/style.css') }}" rel="stylesheet">

		<style>
			.btn-warning {
				background-color: #ffa033;
				border-color: #ff8633;
				color: #fff;
			}

            .bg-warning {
                background-color: #ff8633 !important;
            }

			.text-warning {
				color: #ff8633 !important;
			}

            /*body {
                top: 0 !important;
                font-family: 'Montserrat', sans-serif;
            }*/

            .bg-primary, .btn-primary {
                background-color: #1077b2 !important;
            }

            .text-primary, .site-text-primary {
                color: #1077b2 !important;
            }

            @media (min-width: 995px) {
                .head-text {
                    position: relative;
                    top: -150px;
                }
            }
        </style>
	</head>

	<body>
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div id="preloader">
			<div class="preloader"><span></span><span></span></div>
		</div>

		<!-- ============================================================== -->
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div id="main-wrapper">

			<!-- Start Navigation -->
            @include('nav')
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->


			@yield('body')

			<!-- ============================ Footer Start ================================== -->
            @include('footer')
			<!-- ============================ Footer End ================================== -->

			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-caret-up"></i></a>


		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->


		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{ asset('assets-2/js/vendors.js') }}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js" integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<script src="{{ asset('assets-2/js/custom.js') }}"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

        @yield('script')

        <div id="google_translate_element" class="hidden"></div>
	</body>

<!-- Mirrored from themezhub.net/jobhill-live-2/jobhill/home-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2026 13:18:05 GMT -->
</html>
