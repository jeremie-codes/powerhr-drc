<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    <div class="body-overlay"></div>

    @include('partials.sidebars')

    <main class="dashboard-main">

        {{-- sidebar --}}
        @include('partials.header')

        {{-- body main --}}
        @yield('content')

    </main>

    @include('partials.scripts')

    @yield('scripts')

    <script>
        $('.remove-button').on('click', function() {
            $(this).closest('.alert').addClass('d-none')
        });
    </script>

    {{-- google translate clear cookie --}}
    <script>
        function clearGoogleTranslate() {
            document.cookie = "googtrans=; path=/; domain=" + window.location.hostname + "; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
            document.cookie = "googtrans=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        }
    </script>

    {{-- google translate trigger en on load if en selected in session --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const currentLocale = "{{ app()->getLocale() }}";

            console.log("Current locale:", currentLocale);

            if (currentLocale === 'en') {

                function triggerTranslate() {
                    const select = document.querySelector('.goog-te-combo');
                    if (select) {
                        select.value = 'en';
                        select.dispatchEvent(new Event('change'));
                    } else {
                        setTimeout(triggerTranslate, 500);
                    }
                }

                triggerTranslate();
            }
        });
    </script>

    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>

        .bg-primary, .btn-primary {
            background-color: #1077b2 !important;
        }

        .text-primary, .site-text-primary {
            color: #1077b2 !important;
        }

        body {
            top: 0 !important;
            font-family: 'Montserrat', sans-serif !important;
        }
    </style>
</body>
</html>
