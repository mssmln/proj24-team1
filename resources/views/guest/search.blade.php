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
                        <li v-on:click="radius = 10000">Nei 10km</li>
                        <li v-on:click="radius = 20000">Nei 20km</li>
                    </ul>
                </div>
                <h2 v-if="radius" v-cloak>Distanza selezionata - @{{radius / 1000}} Km</h2>
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
                    <input type="number" v-model="rooms" id="camere" min="1" placeholder="Stanze">
                </div>

                <div class="box_research">
                    <label for="letti">Letti</label>
                    <input type="number" v-model="beds" id="letti" min="1" placeholder="Letti">
                </div>

            </div>
            {{-- fine advanced_research --}}

            <div class="button_end_box">
                <button class="search_button" @click="searchWithinRadius">Verifica</button>
            </div>
        </div>
        {{-- fine box_search_inputs --}}

        <!-- Ricerca per raggio 20km o 10Km - -->
        <div v-cloak class="advance_search_results">

            <a class="box_searched_item" :href="'flat/' + result.slug" v-for="result in arrayResults" v-if="arrayAdvancedSearch.length == 0 && result.visibility">
                <img v-if="result.title" :src="'storage/' + result.flat_img" alt="result.flat_img">
                <div class="info_basic">
                    <h2>@{{result.title}}</h2>
                    <h3 v-if="result.title">@{{result.address}}</h3>
                </div>
                <div class="sponsor_layover">
                    <div class="show_price">
                        <p>@{{ result.price }}</p>
                    </div>
                    <span>Vai ai dettagli</span>
                    <div class="more_info">
                        <p>@{{ result.beds }} Letti</p>
                        <p>@{{ result.rooms }} Camere</p>
                    </div>
                </div>
            </a>
        </div>

        @if (count($ads) > 0)
        <h2 class="sponsor_title_search_ad">Appartamenti in evidenza</h2>
        @endif
        
        <div class="advance_search_results">
        @foreach ($ads as $item)
        @if($item->flat->visibility)
            <a class="box_searched_item" href="{{Route('flat', $item->flat->slug)}}">
                <img src="{{ asset('storage/'.$item->flat->flat_img) }}" alt="{{$item->flat->title}}">
                <div class="info_basic">
                    <h2>{{$item->flat->title}}</h2>
                    <h3>{{$item->flat->address}}</h3>
                </div>
                <div class="sponsor_layover">
                    <div class="show_price">
                        <p>{{$item->flat->price}} €</p>
                    </div>
                    <span>Vai ai dettagli</span>
                    <div class="more_info">
                        <p>{{$item->flat->beds}} Letti</p>
                        <p>{{$item->flat->rooms}} Camere</p>
                    </div>
                </div>
            </a>
        @endif
        @endforeach
        </div>

    </div>
    {{-- fine big_box_search --}}
</div>

@endsection
