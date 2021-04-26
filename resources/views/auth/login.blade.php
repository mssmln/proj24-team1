@extends('layouts.app')

@section('content')
<div class="login_page">
    <div id="particles_balls">
        <div v-for="i in 30" class="particle"></div>
    </div>
    
    <div class="container">

        <form id="position_form_login" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="webflow_style_input">
                @error('email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="Email">
            </div>

            <div class="webflow_style_input">
                @error('password')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Password">
            </div>

            <div class="checkbox_login">

                <div class="fix_flex">
                    <input class="switch_1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div>
                    <button type="submit" class="login_button">
                        {{ __('Login') }}
                        <span class="bg_login_button"></span>
                    </button>
                </div>

                {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
            </div>
        </form>

    </div>

</div>
@endsection


