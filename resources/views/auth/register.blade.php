@extends('layouts.app')

@section('content')
<div class="register_page">
    <div id="particles_balls">
        <div v-for="i in 30" class="particle"></div>
    </div>

    <div class="container">
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="webflow_style_input">
                @error('name')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus placeholder="Name">

            </div>

            <div class="webflow_style_input">
                @error('surname')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="off" autofocus placeholder="Surname">

            </div>

            <div class="webflow_style_input">
                @error('date_of_birth')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="off" autofocus>

            </div>

            <div class="webflow_style_input">
                @error('email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Email">

            </div>

            <div class="webflow_style_input">
                @error('password')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Password">

            </div>

            <div class="webflow_style_input">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="Confirm Password">
            </div>

            <div class="checkbox_register">
                <button type="submit" class="login_button">
                    {{ __('Registrati') }}
                </button>
            </div>

        </form>

    </div>

</div>
@endsection
