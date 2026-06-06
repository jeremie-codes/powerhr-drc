<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
    data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | PowerHR</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    @include('auth.layouts.head-css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

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

<!-- Content -->
@yield('content')

<!-- Vendor Script -->
@include('auth.layouts.vendor-scripts')

</body>

</html>
