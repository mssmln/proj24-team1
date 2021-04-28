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

<<<<<<< HEAD


        <div class="advanced_research">
            <div class="box_research">
                <label for="address">Indirizzo</label>
                <input v-model="query" @keyup="getLanLon" type="text" id="address" placeholder="Via e città (o CAP)">
            </div>
            <div class="box_research">
                <label for="camere">Numero minimo di camere</label>
                <input type="number" v-model="rooms" id="camere" min="1">
            </div>
            <div class="box_research">
                <label for="letti">Numero minimo di Letti</label>
                <input type="number" v-model="beds" id="letti" min="1">
            </div>
            <button class="search_button" @click="searchWithinRadius">Verifica</button>
=======
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
>>>>>>> ec850d8c1e73dfb9af46c8530c529391e922ef7f
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
<<<<<<< HEAD
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
=======
                        <p>@{{ result.price }} €</p>
>>>>>>> ec850d8c1e73dfb9af46c8530c529391e922ef7f
                    </div>
                    <div class="sponsor_layover">
                        <span>Mostra</span>

                    </div>
                </a>

<<<<<<< HEAD
                <a class="box_searched_item" href="#">
                    <img src="https://www.berlino.com/wp-content/uploads/sites/13/Appartamenti.jpg" alt="#">
                    <h2>Appartamento a villafranca di verona</h2>
                    <h3>Via Scuderlando 4, 37135 Verona</h3>
                    <div class="more_info">
                        <p>Camere: 1</p>
                        <p>Letti: 2</p>
                    </div>
                    <div class="show_price">
                        <p>35 €</p>
                    </div>
                    <div class="sponsor_layover">
                        <span>Mostra</span>

                    </div>
                </a>

                <a class="box_searched_item" href="#">
                    <img src="https://lh3.googleusercontent.com/proxy/EWbZnuglJdypvVO6OPRABizylPLaAkTXMXV0eTfGVIXuC8fGRNk8SZrQBWWziKHIIYAlpUjykXmMqTPp3BWY4vUgsnIh_0buvqBthizHmMdS6iepVnUbdgS13gZD0VdQjAs0wB9sr7sGKhWQGXA" alt="#">
                    <h2>Secondo appartamento a verona</h2>
                    <h3>Via Alessandro Sala 4, 37067 Valeggio sul Mincio</h3>
                    <div class="more_info">
                        <p>Camere: 3</p>
                        <p>Letti: 6</p>
                    </div>
                    <div class="show_price">
                        <p>35 €</p>
                    </div>
                    <div class="sponsor_layover">
                        <span>Mostra</span>

                    </div>
                </a>

                <a class="box_searched_item" href="#">
                    <img src="https://familygo-c02.kxcdn.com/wp-content/uploads/2020/02/living-jesolo-appartamenti-app-30-sala.jpg" alt="#">
                    <h2>Primo appartamento a Verona</h2>
                    <h3>Corso Como 3, 20154 Milano</h3>
                    <div class="more_info">
                        <p>Camere: 3</p>
                        <p>Letti: 4</p>
                    </div>
                    <div class="show_price">
                        <p>35 €</p>
                    </div>
                    <div class="sponsor_layover">
                        <span>Mostra</span>

                    </div>
                </a>

                <a class="box_searched_item" href="#">
                    <img src="https://www.ibizalowcost.com/wp-content/uploads/2018/01/living-appartamento-ikebanab3b-ibiza.jpg" alt="#">
                    <h2>La villa campione al pari di una reggia vieni ora</h2>
                    <h3>Via Monte Napoleone 4, 20121 Milano</h3>
                    <div class="more_info">
                        <p>Camere: 2</p>
                        <p>Letti: 4</p>
                    </div>
                    <div class="show_price">
                        <p>35 €</p>
                    </div>
                    <div class="sponsor_layover">
                        <span>Mostra</span>

                    </div>
                </a>

                <a class="box_searched_item" href="#">
                    <img src="https://www.classcountryhomes.it/wp-content/uploads/2019/05/appartamenti-in-vendita-roma-nord-58.jpg" alt="#">
                    <h2>Come sentirsi a casa con un appartamento da sogno</h2>
                    <h3>Via Monte Napoleone 4, 20121 Milano</h3>
                    <div class="more_info">
                        <p>Camere: 1</p>
                        <p>Letti: 2</p>
                    </div>
                    <div class="show_price">
                        <p>35 €</p>
                    </div>
                    <div class="sponsor_layover">
                        <span>Mostra</span>

                    </div>
                </a> -->

                {{-- proVA PER FORMATTARE -----------------------------------------------------------------------------------------}}
                {{-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=DA CANCELLARE=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- --}}

=======
>>>>>>> ec850d8c1e73dfb9af46c8530c529391e922ef7f
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
