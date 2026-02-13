<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POWER-HR</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Remix Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">

    <!-- Apex Charts -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">

    <!-- Text Editor -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}">

    <!-- Calendar -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}">

    <!-- Vector Map -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">

    <!-- Popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}">

    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}">

    <!-- Prism -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/prism.css') }}">

    <!-- File Upload -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/file-upload.css') }}">

    <!-- Audio Player -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/audioplayer.css') }}">

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script>

        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {
                    pageLanguage: 'fr',
                    includedLanguages: 'fr,en',
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
