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

    <script src="{{ mix('websocket.js', 'vendor/web') }}"></script>

</head>
<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen bg-gray-200">
        <div class="flex justify-end p-4 space-x-2">
            <a class="font-bold px-4 py-2 bg-blue-300 rounded-lg hover:bg-blue-400" href="/">Home</a>
            <a class="font-bold px-4 py-2 bg-blue-300 rounded-lg hover:bg-blue-400" href="/inertia-websocket">Inertia Websocket</a>
        </div>
        <div class="flex flex-col flex-grow justify-center items-center">
            <div class="flex justify-center p-4" id="quote_div">
                <span class="text-5xl -mt-5">"</span>
                <div class="flex flex-col space-x-2">
                    <div class="italic" id="quote_text"></div>
                    <div class="h-full text-right font-bold" id="by_text"></div>
                </div>
                <span class="text-5xl -mt-5">"</span>
            </div>
            <button class="px-4 py-2 bg-blue-300 rounded-lg hover:bg-blue-400" id="inspiring_button">Get Inspiring using websocket</button>
        </div>
    </div>

    <script>
        window.debug = true
        window.channel = 'websocket-inspiring-event'
        window.listen = 'inspiring-update'

        $(document).ready(function () {
            $('#quote_div').hide()

            //load_websocket('{{ websocket_url() }}')
            init_websocket('{{ websocket_url() }}')
        })

        $('#inspiring_button').click(function () {
            $('#quote_div').hide()
            $.get('/get-websocket-inspiring')
        })
    </script>
</body>
</html>
