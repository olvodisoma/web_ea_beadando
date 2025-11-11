<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title', 'Városvégi Gimnázium')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">
                @yield('content')
            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="inner">

                <!-- Menu -->
                <nav id="menu">
                    <header class="major">
                        <h2>Menü</h2>
                    </header>
                    <ul>
                        <li><a href="{{ url('/') }}">Főoldal</a></li>
                        <li><a href="{{ url('/kapcsolat') }}">Kapcsolat</a></li>

                        @auth
                            <li><a href="{{ route('diagram') }}">Diagram</a></li>
                            <li><a href="{{ route('uzenetek')  }}">Üzenetek</a></li>
                            <li><a href="{{ route('diakok.index') }}">CRUD – Diákok</a></li>
                           
                            <li><a href="{{ route('adatbazis') }}">Adatbázis</a></li>
                            @if(auth()->user()->role === 'admin')
                            <li><a href="{{ route('admin') }}">Admin</a></li>
                            @endif

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" style="background:none;border:none;color:#fff;cursor:pointer;">
                                        Kijelentkezés
                                    </button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
                            <li><a href="{{ route('register') }}">Regisztráció</a></li>
                        @endauth
                    </ul>
                </nav>

                <!-- Footer -->
                <footer id="footer">
                    <p class="copyright">
                        &copy; Városvégi Gimnázium 2025. Minden jog fenntartva.
                    </p>
                </footer>

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
