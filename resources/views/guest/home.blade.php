@extends('layouts.app')

@section('content')

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
    <div class="flat" :class="(query != '') ? 'show_item' : 'hidden_item'" v-if="flat.address.toLowerCase().includes(query.toLowerCase())" v-for="flat in flats">
        <h2> @{{ flat.address }}</h2>
        <img :src="'storage/' + flat.flat_img" alt="flat.flat_img">
    </div>
</div>

@endsection


