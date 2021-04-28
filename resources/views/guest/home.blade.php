@extends('layouts.app')

@section('content')
<div class="home_guest">

    <div class="jumbotron">

        @include('guest.partials.header2')

        {{-- Sfondo jumbotron --}}
        <img class="bg_jumbo" src=" {{asset('images/bg_secondary_home.webp')}} " alt="jumbotron background">

        {{-- Title --}}
        <div class="home_title">
            <h1>Immergiti nella natura</h1>
            <p>Trova il tuo preferito</p>
            <a href="#"></a>
        </div>

        <div class="container">

            {{-- Input Ricerca --}}
            <div class="input_search_home">
                <input @blur="clearSearchHomePage" v-model="query" @keyup="getLanLon" type="text" class="search_home_guest"  placeholder="Dove vuoi andare?">

                <div v-cloak class="flat_list" v-if="flats.length > 0" :class="(query != '') ? 'show_item' : 'hidden_item'">
                    {{-- Stampa Ricerca --}}
                    <a :href="'flat/' + flat.slug" class="flat"  v-if="flat.address.toLowerCase().includes(query.toLowerCase()) && flat.visibility" v-for="(flat,index) in flats"> 
                        <img :src="'storage/' + flat.flat_img" alt="img_error">
                        <div>
                            <h4> @{{ flat.title }}</h4>
                            <h5> @{{ flat.address }}</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="sponsor_flat">
        <div class="container">
            <div class="mix_margin">
                
                @if (count($ads) > 0)
                <h2 class="homepage_sposnsor_title">Appartamenti in evidenza</h2>
                @endif

                <div class="box_sponsor">
                    @foreach ($ads as $key => $item)
                    {{-- Ne stampera massimo 8 data la query del controller --}}
                    @if($item->flat->visibility)
                
                    <div class="sigle_box_sponsor">
                        <a href="{{Route('flat', $item->flat->slug)}}">
                            <img src="{{ asset('storage/'.$item->flat->flat_img) }}" alt="{{$item->flat->title}}">       
                            <div class="sponsor_layover">
                                <span>{{$item->flat->title}}</span>  
                                <span class="layover_city">{{$item->flat->city}}</span>            
                                <span class="layover_price">{{$item->flat->price}} &#8364;</span>            
                            </div>
                        </a>
                    </div>

                    @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="become_a_host">
        <div class="container">
            <div class="banner_become">
                <h2>Diventa host</h2>
                <p>Condividi il tuo  spazio per guadagnare qualcosa in più e scoprire nuove opportunità.</p>
                <a class="button_primary" href="{{ route('register') }}">Registrati</a>
            </div>
        </div>

    </div>


</div>

@endsection


