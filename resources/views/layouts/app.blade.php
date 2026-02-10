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
</body>
</html>
