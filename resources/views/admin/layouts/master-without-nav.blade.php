<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
    data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | PWHR</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    @include('admin.layouts.head-css')

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

            // 1️⃣ Google Translate
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event('change'));
            }

            // 2️⃣ Sauvegarde en session Laravel
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

    <div id="google_translate_element" class="hidden"></div>

    <style>
        .skiptranslate {
            display: none !important;
        }
        body {
            top: 0 !important;
        }
    </style>

</head>

<!-- Content -->
@yield('content')


<!-- Vendor Script -->
@include('admin.layouts.vendor-scripts')


</body>

</html>
