<header>
    {{-- inizio sezione info in cima all'header --}}
    <div class="header_info">
        <a href="#">Scopri le informazioni più recenti sulla nostra risposta all'emergenza COVID-19</a>
    </div>

    {{-- inizio navbar dell'header --}}
    <div class="nav_header">
        {{-- box logo --}}
        <div class="box_logo">
            <a href="{{ url('/') }}"><img src="https://seeklogo.com/images/A/airbnb-logo-1D03C48906-seeklogo.com.png" width="35rem" alt="logo"></a>
        </div>

        {{-- inizio nav-list --}}
        <div class="nav_list">
            <ul>
                <li><a href="#">Alloggi</a></li>
                <li class="active"><a href="#">Esperienze</a></li>
                <li><a href="#">Esperienze Online</a></li>
            </ul>
        </div>

        {{-- inizio nav-user --}}
        <div class="nav_user">
            <ul>
                @auth
                <li><a href="{{ Route('home') }}">Dashboard</a></li>
                @else
                <li><a href="{{ route('register') }}">Diventa un host</a></li>
                @endauth
                <li><a href="#"><i class="fas fa-globe"></i></a></li>

                <li class="user_action">

                    <div class="profile_menu" @click="headerNavProfile">
                        <i class="fas fa-bars"></i>
                        {{-- Icona Profilo piena --}}
                        <i class="fas fa-user-circle"></i>

                        <div class="user_log" :class="classNavbarClick">
                            <ul>
                                @guest
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                    @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif
                                @else
                                    <li>
                                        <a href="#" role="button" data-toggle="dropdown">
                                            Hi {{ Auth::user()->name }}!
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                                <li><a href="#">Assistenza</a></li>
                            </ul>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
