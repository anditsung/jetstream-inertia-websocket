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
        <script src="https://cdn.jsdelivr.net/npm/weakmap@0.0.6/weakmap.min.js"></script>
        <script src="{{ mix('es6.support.js', 'vendor/web') }}" defer></script>
        <script src="{{ mix('app.vanilla.js', 'vendor/web') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
