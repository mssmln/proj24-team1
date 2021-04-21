@extends('layouts.app')

@section('title', 'cerca un appartamento')


@section('content')
questa è la view search


<div class="container">

    <input v-model="query" @keyup="getLanLon" type="text" placeholder="search in here">
    <!-- filtri -->
    <select name="" id="">
    <option value="">entro i 20km</option>
    <option value="">più di 20km</option>

    
    
    </select>
    <button @click="searchWithinRadius">search</button>


</div>

@endsection