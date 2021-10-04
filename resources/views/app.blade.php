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
{{--        add support for old browser--}}
{{--        <script src="https://polyfill.io/v3/polyfill.min.js?features=es6%2CSet%2CSymbol%2CWeakMap%2Ces5%2Ces2015"></script>--}}
        <script src="{{ mix('app.js', 'vendor/web') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
