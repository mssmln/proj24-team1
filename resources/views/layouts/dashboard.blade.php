<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Chart.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="icon" href="https://seeklogo.com/images/A/airbnb-logo-1D03C48906-seeklogo.com.png" sizes="16x16 24x24 32x32 48x48 64x64 128x128">

    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>

</head>
<body style="background-color: #121212">

    <!-- Authentication Links -->
    <ul>
        @guest
            <li>
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @endguest
    </ul>
      
    <div id="dashboard">
        <nav id="side_bar">
            <!-- High -->
            <ul class="high_sidebar">
                <li>
                    <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">
                        <img src="https://seeklogo.com/images/A/airbnb-logo-1D03C48906-seeklogo.com.png" width="35rem" alt="">
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-house-user"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('flat.index') }} ">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
            </ul>

            <!-- Low -->
            <ul>
                <li>
                    <a href="">
                        <i class="fas fa-cog rotate-item"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li>
                    <small id="clock"></small>
                    <script>
                        // Live clock
                        var liveclock = document.getElementById('clock');
                        function time() {
                            var d = new Date();
                            var m = d.getMinutes();
                            var h = d.getHours();
                            liveclock.innerHTML = ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2);
                        }
                        setInterval(time, 1000);
                    </script>
                </li>
            </ul>
        </nav>

        <section class="dashboard-content">
            @yield('content')
        </section>

        @yield('charts')

    </div>
    
</body>
</html>
