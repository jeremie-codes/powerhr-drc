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
