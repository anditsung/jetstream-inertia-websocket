<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="{!! asset('vendor/websocket/jquery-3.6.0.js') !!}"></script>
    <script src="{{ asset('vendor/websocket/index.js') }}"></script>

</head>
<body class="font-sans antialiased bg-gray-200">
    <div class="flex min-h-screen justify-center">
        <div class="flex items-center">
            <div class="flex flex-col text-center">
                <div class="flex justify-center p-4" id="quote_div">
                    <span class="text-5xl -mt-5">"</span>
                    <div class="flex flex-col space-x-2">
                        <div class="italic" id="quote_text"></div>
                        <div class="h-full text-right font-bold" id="by_text"></div>
                    </div>
                    <span class="text-5xl -mt-5">"</span>
                </div>
                <div>
                    <button class="px-4 py-2 bg-blue-300 rounded-lg hover:bg-blue-400" id="inspiring_button">Get Inspiring using websocket</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.debug = true;
        window.channel = 'websocket-inspiring-event'
        window.listen = 'inspiring-update'

        $(document).ready(function () {
            $('#quote_div').hide()
            init_websocket('{{ websocket_url() }}')
        })

        $('#inspiring_button').click(function () {
            $('#quote_div').hide()
            $.get('/get-websocket-inspiring')
        })
    </script>
</body>
</html>
