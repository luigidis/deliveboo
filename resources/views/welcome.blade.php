<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DeliveBoo</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 10vw;
            font-weight: bold;
        }

        .links>a {
            padding: 0 0.5rem;
            font-size: 1.25rem;
            font-weight: bold;
            text-decoration: none;
            text-transform: capitalize;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a class="mr-4" href="{{ url('/') }}">Home page</a>
                    @if (Auth::user()->is_admin)
                        <a href="{{ url('/admin/home') }}">Dashboard ristoranti</a>
                    @else
                        <a href="{{ url('/admin/home') }}">Dashboard ristorante</a>
                    @endif
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrati</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Delive<span class="c_seco_color">Boo</span>
            </div>
        </div>
    </div>
</body>

</html>
