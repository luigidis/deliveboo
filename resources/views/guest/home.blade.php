<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Deliveboo</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{-- Tailwind --}}
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
              theme: {
                extend: {
                  container: {
                    center: true,
                  }
                }
              }
            }
          </script>
          
    </head>

    <body>

        <div id="app"></div>

        <!-- Scripts -->
        <script src="{{ asset('js/front.js') }}" defer></script>

    </body>
</html>