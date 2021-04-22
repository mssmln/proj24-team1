@extends('layouts.app')

@section('title', 'cerca un appartamento')


@section('content')
questa è la view search



    <input v-model="query" @keyup="getLanLon" type="text" placeholder="search in here">
    <button @click="searchWithinRadius">per raggio</button>

    <input type="number" v-model="rooms">
    <input type="number" v-model="beds">

    <div>

        <input type="checkbox" name="Wi-Fi" v-model="checked">
        <label>@{{ checked }}</label>
        <input type="checkbox" name="Sauna">
        <input type="checkbox" name="Parking">

    </div>
@endsection