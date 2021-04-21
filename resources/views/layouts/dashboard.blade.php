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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Chart.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="icon" href="https://seeklogo.com/images/A/airbnb-logo-1D03C48906-seeklogo.com.png" sizes="16x16 24x24 32x32 48x48 64x64 128x128">


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
            <ul>
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
                <li>
                    <a href="">
                        <i class="fas fa-chart-line"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-comments"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-charging-station"></i>
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
                </li>
                <!-- <li id="time"></li> -->
            </ul>
        </nav>
    
        <section id="app" class="dashboard-content">
            @yield('content')
        </section>
    </div>
    
</body>
</html>
