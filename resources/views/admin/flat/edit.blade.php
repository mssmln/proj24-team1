@extends('layouts.dashboard')

@section('title', 'Admin | Edit Flat')

@section('content') 
questa è la edit

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('flat.update', $flats->id) }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
        <div class="form_create_edit">
            <input id="title" name="title" type="text" class="form_input" value="{{ $flats->title }}" required autocomplete="off" title="Inserisci un titolo">
        <label for="title" class="form_label">Titolo</label>
        </div>

        <div class="form_create_edit">
            <input type="text" id="price" name="price" class="form_input" value="{{ $flats->price }}" autocomplete="off" required>
            <label for="price" class="form_label">Prezzo</label>
        </div>
        
        <div class="form_create_edit">
            <input type="text" id="rooms" name="rooms" class="form_input" value="{{ $flats->rooms }}" autocomplete="off" required>
            <label for="rooms" class="form_label">Stanze</label>
        </div>
        
        <div class="form_create_edit">
            <input type="text" id="beds" name="beds" class="form_input" value="{{ $flats->beds }}" autocomplete="off" required>
            <label for="beds" class="form_label">Letti</label>
        </div>
        
        <div class="form_create_edit">
            <input type="text" id="baths" name="baths" class="form_input" value="{{ $flats->baths }}" autocomplete="off" required>
            <label for="baths" class="form_label">Bagni</label>
        </div>

        <div class="form_create_edit">
            <input type="text" id="sqm" name="sqm" class="form_input" value="{{ $flats->sqm }}" autocomplete="off" required title="Inserisci i metri quadrati">
            <label for="sqm" class="form_label">MQ</label>
        </div>

        
        <div class="form_create_edit">
            <a href="#" @click="tomtomAdresses">Ricalcola</a>
            <input v-model="address" ype="text" id="address" class="form_input" autocomplete="off">
            <label for="address" class="form_label">Indirizzo</label>
        </div>
        
        <div class="form_create_edit">
            <input readonly="text" name="lat" class="form_input" v-model="lat">
            <label class="form_label">Lat</label>
        </div>
        <div class="form_create_edit">
            <input readonly="text" name="lng" class="form_input" v-model="lng">
            <label class="form_label">Long</label>
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
            <input readonly="text" name="city" class="form_input" v-model="comune">
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
            <input readonly="text" type="text" id="address" name="address" class="form_input not" v-model="indirizzo">
            <label for="address">Indirizzo</label>
        </div>

        <!-- Descrizione  -->
        <div class="form_create_edit">
            <textarea class="form_input" name="overview">{{ $flats->overview }}</textarea>
            <label class="form_label" for="overview">Descrizione</label>
        </div>

        <!-- View Img -->
        <div class="form-group">
            <img style="width: 100px;" src="{{asset('storage/'.$flats->flat_img)}}" alt="{{$flats->title}}">
        </div>

        <!-- Update Img -->
        <div class="form-group">
            <label for="flat_img">Update Image</label>
            <input type="file" class="form-control-file" id="flat_img" name="image">
        </div>

        <!-- Visibility -->
        @if($flats->visibility)
            <label for="visibility">Click to Hide</label>
            <input type="checkbox" class="switch_1" id="visibility" name="visibility" value="{{$flats->visibility = 0}}">
        @else
            <label for="visibility">Click to show</label>
            <input type="checkbox" class="switch_1" id="visibility" name="visibility" value="{{$flats->visibility = 1}}">
        @endif

        <!-- Area dei servizi  -->
        @foreach($services as $service)
        <div class="form-group form-check">
            <input type="checkbox" class="switch_1"  name="services[]" value="{{$service->id}}" {{$flats->services->contains($service->id) ? 'checked=checked' : ''}}>
            <label class="form-check-label" >{{$service->name}}</label>
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">edit</button>
    </form>
</div>


@endsection