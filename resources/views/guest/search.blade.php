@extends('layouts.app')

@section('title', 'Airbnb | Ricerca Avanzata')

@section('content')

    <input v-model="query" @keyup="getLanLon" type="text" placeholder="search in here">
    <button @click="searchWithinRadius">RAGGIO</button>

    
    <input type="text" v-on:click="radius = 20000" readonly="text" placeholder="20000">
    <input type="text" v-on:click="radius = 10000" readonly="text" placeholder="10000">
    <h2 v-if="radius">raggio in metri: @{{radius}}</h2>

    numero minimo di stanze<input min="1" type="number" v-model="rooms">

    numero minimo di letti<input min="1" type="number" v-model="beds">


    <!-- ricerca per raggio 20km -->
    <div class="primo div">
        <a :href="'flat/' + result.slug" v-for="result in arrayResults" v-if="arrayAdvancedSearch.length == 0">
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



    

@endsection