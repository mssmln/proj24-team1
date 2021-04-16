@extends('layouts.app')


@section('content')
<div class="flex-center position-ref full-height">
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ Route('home') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif

<div class="content">
    <div class="title m-b-md">
        <h1>AIRBNB Vigorsol</h1>
    </div>

    <div class="links">
        <a href="{{route('search')}}">Ricerca</a>
        <a href="{{route('flat')}}">Appartamenti</a>
    </div>
</div>



<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Ricerca</span>
    </div>
    <input v-model="query" type="text" class="form-control">
</div>


<!-- flats -->
<div class="container">
    <div class="flat" :class="(query != '') ? 'show_item' : 'hidden_item'" v-if="flat.title.toLowerCase().includes(query.toLowerCase())" v-for="flat in flats">
    @php //la @ serve per stampare vue data con blade  @endphp
        <h2> @{{ flat.title }}</h2> 
        <img :src="'storage/' + flat.flat_img" alt="flat.flat_img">
    </div>
</div>



@endsection
