@extends('layouts.app')

@section('title', 'Airbnb | Ricerca Avanzata')

@section('content')
<div class="container">

    <!-- sezioni errori se la ricerca non va bene -->

    <h2>Affina la ricerca dell'appartamento</h2>

    <!-- da formattare come una select menu -->
    <ul>
        <li v-on:click="radius = 20000">20km</li>
        <li v-on:click="radius = 10000">10km</li>
    </ul>

    <!-- validations -->
    <div :class="missingAddress">hai bisogno di inserire l'indirizzo e selezionare il radius</div>
    <div :class="missingRadius">first you need to select the radius</div>
    <div :class="missingResult">nessun risultato coi criteri di ricerca utilizzati</div>
    <!-- /validations -->
    
    
    <h2 v-if="radius" v-cloak>raggio in metri: @{{radius}}</h2>
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
            <label for="letti">numero minimo di Letti</label>
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
