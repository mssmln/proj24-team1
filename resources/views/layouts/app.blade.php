<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title', 'Airbnb | Alloggi per vacanze, case, hotel, esperienze e altro')</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <!-- Link fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Tom Tom's Map -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.12.0/maps/maps.css'>

    <!-- Favicon -->
    <link rel="icon" href="https://seeklogo.com/images/A/airbnb-logo-1D03C48906-seeklogo.com.png" sizes="16x16 24x24 32x32 48x48 64x64 128x128">
</head>
<body>
    
    <div id="app">
        @unless (Route::currentRouteName() === 'homepage')
        @include('guest.partials.header')
        @endunless

        <main>
            @yield('content')
        </main>
    </div>

    @yield('map')
    
    @unless (Route::currentRouteName() === 'login' || Route::currentRouteName() === 'register')
        <a id="to-top" href="#top"><i class="fas fa-chevron-up"></i></a>
    @endunless
    
    @unless (Route::currentRouteName() === 'login' || Route::currentRouteName() === 'register')
        @include('guest.partials.footer')
    @endunless

    
</body>
</html>
