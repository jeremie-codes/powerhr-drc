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
</body>
</html>
