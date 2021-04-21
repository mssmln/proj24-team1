@extends('layouts.app')

@section('content')
<div class="home_guest">
    <div class="border_input"></div>

    <div class="jumbotron">

        <div class="container">
    
            {{-- Input Ricerca --}}
            <div class="input_search_home">
                <input v-model="query" @keyup="getLanLon" type="text" class="search_home_guest"  placeholder="Dove vuoi andare? ">
                <button @click="searchWithinRadius">search</button>
                <div class="flat_list" :class="(query != '') ? 'show_item' : 'hidden_item'">
                    
                    {{-- Stampa Ricerca --}}
                    <a :href="'flat/' + flat.slug" class="flat"  v-if="flat.address.toLowerCase().includes(query.toLowerCase())" v-for="(flat,index) in flats"> 
                        <img :src="'storage/' + flat.flat_img" alt="flat.flat_img">
                        <div>
                            <h4> @{{ flat.title }}</h4>
                            <h5> @{{ flat.address }}</h5>
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg_jumbotron"></div>
       
            <div class="home_title">
                <h1>Goditi il soggiorno ogni giorno</h1>
            </div>
        </div>
    </div>

    <div class="become_a_host">
        <div class="container">
            <div class="banner_become">
                <h2>Diventa host</h2>
                <p>Condividi il tuo  spazio per guadagnare qualcosa in più e scoprire nuove opportunità.</p>
                <a href="{{ route('register') }}">Registrati</a>
            </div>
        </div>
    
    </div>


</div>

@endsection


