<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('app.css', 'vendor/web') }}">

        <!-- Scripts -->
        @routes
{{--        <script src="https://cdn.jsdelivr.net/npm/weakmap-polyfill@2.0.4/weakmap-polyfill.min.js"></script>--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/symbol-es6@0.1.2/symbol-es6.js"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.6/es6-sham.min.js" integrity="sha512-uOJK5irxcOtq1g09xXAQWrq5p/Z96ztb+spIVmPsgZk1GGbHrfkYL8wDkVerKHdHFjgL+uCDRfrb0j86x68yUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ mix('app.vanilla.js', 'vendor/web') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
