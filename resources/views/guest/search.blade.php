@extends('layouts.app')

@section('title', 'Airbnb | Ricerca Avanzata')

@section('content')
<div class="container">

    <h1>Affina la ricerca dell'appartamento</h1>
    
    <!-- Da formattare come una select menu -->
    <ul>
        <li v-on:click="radius = 20000">Distanza 20km</li>
        <li v-on:click="radius = 10000">Distanza 10km</li>
    </ul>
    
    <!-- Sezioni errori se la ricerca non va bene -->
    <!-- Validations -->
    <div v-if="ifErrors">@{{ifErrors}}</div>
 
    <h2 v-if="radius" v-cloak>Distanza selezionata - @{{radius / 1000}} Km</h2>
    <div class="advanced_research">

        <div class="box_research">
            <label for="address">Indirizzo</label>
            <input v-model="query" @keyup="getLanLon" type="text" id="address" placeholder="inserisci la via e la città o cap">
        </div>

        <div class="box_research">
            <label for="camere">Numero minimo di camere</label>
            <input type="number" v-model="rooms" id="camere" min="1">
        </div>

        <div class="box_research">
            <label for="letti">Numero minimo di Letti</label>
            <input type="number" v-model="beds" id="letti" min="1">
        </div>

        {{-- <div class="box_research">
            <label for="raggio">Raggio</label>
            <input type="number" v-model="beds" id="raggio">
        </div> --}}

    </div>

    <button  @click="searchWithinRadius">per raggio</button>

    <!-- ricerca per raggio 20km -->
    <div v-cloak class="primo div">
        <a :href="'flat/' + result.slug" v-for="result in arrayResults" v-if="arrayAdvancedSearch.length == 0 && result.visibility">
            <img v-if="result.title" :src="'storage/' + result.flat_img" alt="result.flat_img">
            <h2>@{{result.title}}</h2>
            <h3 v-if="result.title">@{{result.address}}</h3>
        </a>
    </div>

    <!-- ricerca per rooms e beds  -->
    <div v-cloak class="secondo div">
        <a :href="'flat/' + result.slug" v-for="result in arrayAdvancedSearch" v-if="result.visibility">
            <img :src="'storage/' + result.flat_img" alt="result.flat_img">
            <h2>@{{result.title}}</h2>
            <h3>@{{result.address}}</h3>
        </a>
    </div>

</div>

@endsection
