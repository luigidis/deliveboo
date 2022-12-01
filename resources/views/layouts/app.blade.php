<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg_text_color stroke_bottom">
            <div class="container">
                <a class="navbar-brand font-weight-bold font_big" href="{{ url('/admin') }}">
                    Delive<span class="c_seco_color">Boo</span>
                </a>
                <div class="box_shadow_stroke_small bg-white menu_button ml-auto mb-1" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="invisible">Menu</span>
                    <span class="menu_button_item apri">Menu</span>
                    <span class="menu_button_item chiudi">Chiudi</span>
                </div>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto font-weight-normal">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                            @endif
                        @else
                            @if (!Auth::user()->is_admin)
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ route('admin.chart', Auth::user()->id) }}" role="button">
                                        Statistiche
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link"
                                        href="{{ route('admin.plates.index', ['id' => Auth::user()->id]) }}"
                                        role="button">
                                        Piatti
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ route('admin.orders.index', Auth::user()->id) }}"
                                        role="button">
                                        Ordini
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right bg_text_color stroke_full"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/') }}" role="button">
                                        Home page
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.home') }}" role="button">
                                        Dashboard
                                    </a>
                                    @if (Auth::user()->is_admin)
                                        <a class="dropdown-item" href="{{ route('admin.categories.index') }}"
                                            role="button">
                                            Categorie
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Esci') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <script>
            // Menu Button
            const menuEl = document.querySelector('.menu_button')
            const menuOpen = document.querySelector('.menu_button_item.apri')
            const menuClose = document.querySelector('.menu_button_item.chiudi')
            let isClicked = false;
            menuEl.addEventListener('click', () => {
                if(!isClicked){
                    menuClose.classList.add('trans-x-top')
                    menuOpen.classList.add('trans-x-bot')
                } else {
                    menuClose.classList.remove('trans-x-top')
                    menuOpen.classList.remove('trans-x-bot')
                }
                isClicked = !isClicked
            })
        </script>
    </div>
    @yield('chart')
    @stack('script-cdn')
    @yield('script-js')
</body>

</html>
