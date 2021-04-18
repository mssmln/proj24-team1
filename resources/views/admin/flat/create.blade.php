

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

        <div class="form_create_edit">
            <input id="title" name="title" type="text" class="form_input" value="{{old('title')}}" placeholder="Titolo" required>
            <label for="title" class="form_label">Titolo</label>
        </div>

        <div class="form_create_edit">
            <input type="number" id="price" name="price" class="form_input" value="{{old('price')}}" placeholder="Prezzo" required>
            <label for="price" class="form_label">Prezzo</label>
        </div>

        <div class="form_create_edit">
            <input type="number" id="rooms" name="rooms" class="form_input" value="{{old('price')}}" placeholder="Stanze" required>
            <label for="rooms" class="form_label">Stanze</label>
        </div>

        <div class="form_create_edit">
            <input type="number" id="beds" name="beds" class="form_input" value="{{old('beds')}}" placeholder="Letti" required>
            <label for="beds" class="form_label">Letti</label>
        </div>

        <div class="form_create_edit">
            <input type="number" id="baths" name="baths" class="form_input" value="{{old('baths')}}" placeholder="Bagni" required>
            <label for="baths" class="form_label">Bagni</label>
        </div>

        <div class="form_create_edit">
            <input type="number" id="sqm" name="sqm" class="form_input" value="{{old('sqm')}}" placeholder="Metri quadrati" required>
            <label for="sqm" class="form_label">Metri quadrati</label>
        </div>

        <div class="form_create_edit">
            <input v-model="address" @keyup="tomtomAdresses" type="text" id="address" name="address" class="form_input" value="{{old('address')}}" placeholder="Indirizzo" required>
            <label for="address" class="form_label">Indirizzo</label>
        </div>
        
        <!-- Upload an img file  -->
        <div class="form_create_edit">
            <input type="file" class="form-control-file" id="flat_img" name="image">
            <label for="flat_img" class="form_label">Carica Immagine</label>
        </div>

        <!-- Descrizione  -->
        <div class="input-group">
            <label for="overview">Descrizione</label>
            <textarea name="overview">{{old('overview')}}</textarea>
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