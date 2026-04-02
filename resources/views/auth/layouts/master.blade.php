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

    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {
                    pageLanguage: 'fr',
                    autoDisplay: false
                },
                'google_translate_element'
            );
        }

        function changeLanguage(lang) {

            // Google Translate
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event('change'));
            }

            // Sauvegarde en session Laravel
            fetch("{{ route('set.language') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ lang })
            }).then(() => {
                window.location.reload();
            });
        }
    </script>

    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <div id="google_translate_element" class="hidden"></div>

    <style>

        .bg-primary, .btn-primary {
            background-color: #1077b2 !important;
        }

        .text-primary, .site-text-primary {
            color: #1077b2 !important;
        }

        .skiptranslate {
            display: none !important;
        }
        body {
            top: 0 !important;
            font-family: 'Montserrat', sans-serif !important;
        }
    </style>

</head>

<!-- Content -->
@yield('content')


<!-- Vendor Script -->
@include('auth.layouts.vendor-scripts')

</body>

</html>
