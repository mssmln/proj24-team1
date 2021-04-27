@extends('layouts.app')

@section('title', 'Airbnb | Ricerca Avanzata')

@section('content')
<div class="container">

    <h1>Affina la ricerca dell'appartamento</h1>
    
    <!-- Da formattare come una select menu -->
    <ul>
        <li><strong>Seleziona un raggio di ricerca&#42;</strong></li>
        <li v-on:click="radius = 20000">20km</li>
        <li v-on:click="radius = 10000">10km</li>
    </ul>
 
    <h2 v-if="radius" v-cloak>Distanza selezionata - @{{radius / 1000}} Km</h2>

    <div class="advanced_research">

        <div class="box_research">
            <label for="address">Indirizzo&#42;</label>
            <input v-model="query" @keyup="getLanLon" type="text" id="address" placeholder="Inserisci la via e la città o cap">
        </div>

        <div class="box_research">
            <label for="camere">Numero minimo di camere</label>
            <!-- <input type="number" v-model="rooms" id="camere" min="1"> -->
            <select v-model="rooms" id="camere">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
        </div>

        <div class="box_research">
            <label for="letti">Numero minimo di Letti</label>
            <!-- <input type="number" v-model="beds" id="letti" min="1"> -->
            <select v-model="beds" id="letti">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
        </div>

    </div>

    <button  @click="searchWithinRadius">CERCA &#10140;</button>

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
