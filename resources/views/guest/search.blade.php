@extends('layouts.app')

@section('title', 'Airbnb | Ricerca Avanzata')

@section('content')
<div class="container">

    <h2>Affina la ricerca dell'appartamento</h2>

    <div class="advanced_research">

        <div class="box_research">
            <label for="address">Indirizzo</label>
            <input v-model="query" @keyup="getLanLon" type="text" id="address">
        </div>


        <div class="box_research">
            <label for="camere">Numero camere</label>
            <input type="number" v-model="rooms" id="camere">
        </div>

        <div class="box_research">
            <label for="letti">Letti</label>
            <input type="number" v-model="beds" id="letti">
        </div>

        {{-- <div class="box_research">
            <label for="raggio">Raggio</label>
            <input type="number" v-model="beds" id="raggio">
        </div> --}}

    </div>

    <button  @click="searchWithinRadius">per raggio</button>


    <!-- ricerca per raggio 20km -->
    <div class="primo div">
        <a :href="'flat/' + result.slug" v-for="result in arrayResults" v-if="arrayAdvancedSearch.length == 0 && rooms == '' ">
            <img v-if="result.title" :src="'storage/' + result.flat_img" alt="result.flat_img">
            <h2>@{{result.title}}</h2>
            <h3 v-if="result.title">@{{result.address}}</h3>
        </a>
    </div>

    <!-- ricerca per rooms e beds  -->
    <div class="secondo div">
        <a :href="'flat/' + result.slug" v-for="result in arrayAdvancedSearch">
            <img :src="'storage/' + result.flat_img" alt="result.flat_img">
            <h2>@{{result.title}}</h2>
            <h3>@{{result.address}}</h3>
        </a>
    </div>

</div>






@endsection
