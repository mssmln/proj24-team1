@extends('layouts.app')

@section('title', 'Airbnb | Ricerca Avanzata')

@section('content')
<div class="container">

    <div class="big_box_search">
        <div class="box_search_inputs">
            <div class="box_select_radius">
                <h1>Affina le tue ricerche</h1>
                <p>È necessario scegliere il raggio e inserire un indirizzo, per migliorare la tua ricerca, applica i filtri desiderati.</p>
                <div class="action_radius">
                    <ul class="select_radius">
                        <li v-on:click="radius = 10000">Distanza 10km</li>
                        <li v-on:click="radius = 20000">Distanza 20km</li>
                    </ul>


                    <h2 v-if="radius" v-cloak>Distanza selezionata - @{{radius / 1000}} Km</h2>
                </div>
                {{-- fine action_radius per la formattazione flex --}}
            </div>
        </div>

            <div class="advanced_research">

                <div class="box_research box_bigger">
                    <label for="address">Indirizzo</label>
                    <input v-model="query" @keyup="getLanLon" type="text" id="address" placeholder="Via e città (o CAP)">
                </div>

                <div class="box_research">
                    <label for="camere">Camere</label>
                    <input type="number" v-model="rooms" id="camere" min="1" placeholder="Numero minimo">
                </div>

                <div class="box_research">
                    <label for="letti">Letti</label>
                    <input type="number" v-model="beds" id="letti" min="1" placeholder="Numero minimo">
                </div>

            </div>
            {{-- fine advanced_research --}}

            <div class="button_end_box">
                <button class="search_button" @click="searchWithinRadius">Verifica</button>
            </div>
        </div>
        {{-- fine box_search_inputs --}}

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

                {{-- proVA PER FORMATTARE --------------------------------------------------------------------------------------- --}}
                {{-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=DA CANCELLARE=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- --}}

                <!-- <a class="box_searched_item" href="#">
                    <img src="https://www.classcountryhomes.it/wp-content/uploads/2019/05/appartamenti-in-vendita-roma-nord-38.jpg" alt="#">
                    <h2>Primo appartamento a Valeggio</h2>
                    <h3>Via Monte Napoleone 3, 20121 Milano</h3>
                    <div class="more_info">
                        <p>Camere: 2</p>
                        <p>Letti: 2</p>
                    </div>
                    <div class="show_price">
                        <p>35 €</p>
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
