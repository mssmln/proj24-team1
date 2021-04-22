@extends('layouts.app')

@section('title', 'cerca un appartamento')


@section('content')
questa è la view search



    <input v-model="query" @keyup="getLanLon" type="text" placeholder="search in here">
    <button @click="searchWithinRadius">per raggio</button>

    <input type="number" v-model="rooms">
    <input type="number" v-model="beds">


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

    
@endsection