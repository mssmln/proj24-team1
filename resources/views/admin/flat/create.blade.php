@extends('layouts.dashboard')

@section('title', 'Admin | New Flat')

@section('content')
<div id="app">

    <h1>&#127968; Aggiungi un Appartamento</h1>
    <div>
        
        <form class="admin-form container" action="{{ route('flat.store') }}" method="post" enctype="multipart/form-data">
            @csrf 
            @method('POST')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <!-- Title -->
            <div class="admin-form-inputs">
                <input type="text" id="title" name="title" value="{{old('title')}}" autocomplete="off" required placeholder="Titolo" class="title_input">
            </div>

            <div class="box_input_details">
                <!-- Price for night -->
                <div class="admin-form-inputs">
                    <input type="number" id="price" name="price" value="{{old('price')}}" autocomplete="off" required placeholder="Prezzo">
                </div>
                
                <!-- Rooms N° -->
                <div class="admin-form-inputs">
                    <input type="number" id="rooms" name="rooms" value="{{old('rooms')}}" autocomplete="off" required placeholder="Stanze">
                </div>
                
                <!-- Beds N° -->
                <div class="admin-form-inputs">
                    <input type="number" id="beds" name="beds" value="{{old('beds')}}" autocomplete="off" required placeholder="Letti">
                </div>
                
                <!-- Bats N° -->
                <div class="admin-form-inputs">
                    <input type="number" id="baths" name="baths" value="{{old('baths')}}" autocomplete="off" required placeholder="Bagni">
                </div>
        
                <!-- SQM -->
                <div class="admin-form-inputs">
                    <input type="number" id="sqm" name="sqm" value="{{old('sqm')}}" autocomplete="off" placeholder="&#13217;">
                </div>
            </div>
    


            <div class="box_input_address">
                <!-- Address (to generate all data) -->
                <div class="admin-form-inputs">
                    <input v-model="address" type="text" id="address" value="{{old('address')}}" autocomplete="off" required placeholder="Indirizzo da calcolare">
                    <i @click="tomtomAdresses" class="fas fa-sync-alt"></i>
                </div>

                <!-- Address generated -->
                <div class="admin-form-inputs">
                    <input readonly="text" type="text" id="address" name="address" v-model="indirizzo" class="not-usable" placeholder="Indirizzo Finale">
                </div>
            </div>
            
            <!-- Latitude -->
            <div class="admin-form-inputs">
                <input readonly="text" type="hidden" name="lat" v-model="lat" class="not-usable" placeholder="Latitudine">
            </div>
    
            <!-- Longitude -->
            <div class="admin-form-inputs">
                <input readonly="text" type="hidden" name="lng" v-model="lng" class="not-usable" placeholder="Longitudine">
            </div>

            <div class="box_input_check">
                <!-- Address N° -->
                <div class="admin-form-inputs">
                    <input disabled="disabled" readonly="text" v-model="numero" class="not-usable" placeholder="Numero">
                </div>
        
                <!-- CAP -->
                <div class="admin-form-inputs">
                    <input disabled="disabled" readonly="text" v-model="cap" class="not-usable" placeholder="CAP">
                </div>
        
                <!-- Municipality -->
                <div class="admin-form-inputs">
                    <input readonly="text" v-model="comune" class="not-usable" placeholder="Comune">
                </div>
        
                <!-- Province - Citta nel DB-->
                <div class="admin-form-inputs">
                    <input name="city" readonly="text" v-model="provincia" class="not-usable" placeholder="Provincia">
                </div>
            </div>

            <div class="flex_overview_services">
                <!-- Overview  -->
                <div class="admin-form-inputs overview_form">
                    <textarea name="overview" placeholder="Descrivi il tuo appartamento">{{old('overview')}}</textarea>
                </div>
    
                <div class="box_checkbox_services">
                    <!-- Services -->
                    @foreach($services as $service)
                    <div class="switch service_form">
                        <div class="service_one">
                            <input type="checkbox" class="switch_1" name="services[]" value="{{$service->id}}">
                            <label>{{$service->name}}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
                
            <div class="bottom_form">
                <!-- Upload an image file  -->
                <div class="admin-form-inputs image_upload">
                    <input accept="image/*" type="file" id="flat_img" class="input-file" name="image">
                    <label for="flat_img">Aggiungi anteprima dell'appartamento</label>
                </div>
        
                <!-- Visibility -->
                <div class="visibility_form">
                    <input type="checkbox" class="switch_1" id="visibility" name="visibility" value="0">
                    <label for="visibility">Rendi nascosto</em></label>
                </div>
            </div>
    
            <!-- Submit -->
            <button class="submit_form_button" type="submit">Crea appartamento</button>
        </form>

    </div>
</div>


@endsection