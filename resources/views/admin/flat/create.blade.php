

@extends('layouts.dashboard')

@section('title', 'Inserisci un appartamento')

@section('content') 


<h1>Aggiungi un Appartamento</h1>
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('flat.store') }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('POST')

    
    <div class="form_create_edit input_bg">
        <input id="title" name="title" type="text" class="form_input" value="{{old('title')}}" required autocomplete="off" title="Inserisci un titolo">
        <label for="title" class="form_label">Titolo</label>
    </div>
    
    <div class="box_form">

        <div class="input_bg padding_form">

            <div class="form_create_edit">
                <input type="text" id="price" name="price" class="form_input" value="{{old('price')}}" autocomplete="off" required>
                <label for="price" class="form_label">Prezzo</label>
            </div>
            
            <div class="form_create_edit">
                <input type="text" id="rooms" name="rooms" class="form_input" value="{{old('price')}}" autocomplete="off" required>
                <label for="rooms" class="form_label">Stanze</label>
            </div>
            
            <div class="form_create_edit">
                <input type="text" id="beds" name="beds" class="form_input" value="{{old('beds')}}" autocomplete="off" required>
                <label for="beds" class="form_label">Letti</label>
            </div>
            
            <div class="form_create_edit">
                <input type="text" id="baths" name="baths" class="form_input" value="{{old('baths')}}" autocomplete="off" required>
                <label for="baths" class="form_label">Bagni</label>
            </div>

            <div class="form_create_edit">
                <input type="text" id="sqm" name="sqm" class="form_input" value="{{old('sqm')}}" autocomplete="off" required title="Inserisci i metri quadrati">
                <label for="sqm" class="form_label">MQ</label>
            </div>
            
        </div>

    </div>

        
        <div class="form_create_edit">
            <a href="#" @click="tomtomAdresses">Calcola</a>
            <input v-model="address"  type="text" id="address" name="address" class="form_input" value="{{old('address')}}" autocomplete="off" required>
            <label for="address" class="form_label">Indirizzo</label>
        </div>
        
        <div class="form_flex">
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" id="lat" name="lat" class="form_input" v-model="lat">
                <label for="lat" class="form_label">Lat</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" id="lng" name="lng" class="form_input" v-model="lng">
                <label for="lng" class="form_label">Long</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" class="form_input" v-model="via">
                <label class="form_label">Via</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" class="form_input" v-model="numero">
                <label class="form_label">N°</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" class="form_input" v-model="cap">
                <label class="form_label">CAP</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" class="form_input" v-model="comune">
                <label class="form_label">Comune</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" class="form_input" v-model="provincia">
                <label class="form_label">Provincia</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" class="form_input" v-model="regione">
                <label class="form_label">Regione</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" class="form_input" v-model="paese">
                <label class="form_label">Paese</label>
            </div>
            <div class="form_create_edit">
                <input disabled="disabled" readonly="text" type="text" id="address" name="address" class="form_input not" v-model="indirizzo">
            </div>
        </div>

        <!-- Upload an img file  -->
        <div >
            <label for="flat_img" >Carica Immagine</label>
            <input type="file" id="flat_img" name="image">
        </div>

        <!-- Descrizione  -->
        <div class="form_create_edit">
            <textarea class="form_input" name="overview">{{old('overview')}}</textarea>
            <label class="form_label" for="overview">Descrizione</label>
        </div>

        <!-- Visibility -->
        <input type="checkbox" class="switch_1" id="visibility" name="visibility" value="0">
        <label for="visibility">Appartamento Non visibile</label>

        <!-- Area dei servizi -->
        @foreach($services as $service)
        <div class="form-group form-check">
            <input type="checkbox" class="switch_1" name="services[]" value="{{$service->id}}">
            <label class="form-check-label">{{$service->name}}</label>
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">Crea</button>
    </form>
</div>


@endsection