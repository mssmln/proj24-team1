@extends('layouts.app')

@section('title', 'Airbnb | Ricerca Avanzata')

@section('content')
<div class="container">

    <div class="big_box_search">

        <div class="box_select_radius">
            <h1>Ricerca avanzata</h1>
            <p>Seleziona il raggio della tua ricerca</p>
            <div class="action_radius">
                <ul class="select_radius">
                    <li v-on:click="radius = 10000">Distanza 10km</li>
                    <li v-on:click="radius = 20000">Distanza 20km</li>
                </ul>


                <h2 v-if="radius" v-cloak>Distanza selezionata - @{{radius / 1000}} Km</h2>
            </div>
        </div>
        
        {{-- fine box_select_radius --}}

        <div class="advanced_research">

            <div class="box_research">
                <label for="address">Indirizzo</label>
                <input v-model="query" @keyup="getLanLon" type="text" id="address" placeholder="Via e città (o CAP)">
            </div>

            <div class="box_research">
                <label for="camere">Numero minimo di camere</label>
                <input type="number" v-model="rooms" id="camere" min="1">
            </div>

            <div class="box_research">
                <label for="letti">Numero minimo di Letti</label>
                <input type="number" v-model="beds" id="letti" min="1">
            </div>

            <button class="search_button" @click="searchWithinRadius">Verifica</button>
        </div>
        {{-- fine advanced_research --}}

        <!-- ricerca per raggio 20km -->
        <div v-cloak class="advance_search_results">

                <a class="box_searched_item" :href="'flat/' + result.slug" v-for="result in arrayResults" v-if="arrayAdvancedSearch.length == 0 && result.visibility">
                    <img v-if="result.title" :src="'storage/' + result.flat_img" alt="result.flat_img">
                    <h2>@{{result.title}}</h2>
                    <h3 v-if="result.title">@{{result.address}}</h3>
                    <div class="more_info">
                        <p>Camere: @{{ result.rooms }}</p>
                        <p>Letti: @{{ result.beds }}</p>
                    </div>
                    <div class="show_price">
                        <p>@{{ result.price }}</p>
                    </div>
                    <div class="sponsor_layover">
                        <span>Mostra</span>

                    </div>
                </a>

            </div>

                <!-- ricerca per rooms e beds  -->
            {{-- <div v-cloak class="secondo div">
                <a :href="'flat/' + result.slug" v-for="result in arrayAdvancedSearch" v-if="result.visibility">
                    <img :src="'storage/' + result.flat_img" alt="result.flat_img">
                    <h2>@{{result.title}}</h2>
                    <h3>@{{result.address}}</h3>
                </a>
            </div> --}}



    </div>
    {{-- fine big_box_search --}}
</div>

@endsection
