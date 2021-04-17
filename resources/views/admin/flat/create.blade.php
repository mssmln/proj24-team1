

@extends('layouts.dashboard')

@section('title', 'Inserisci un appartamento')

@section('content') 


<h1>Aggiungi un Appartamento</h1>
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



    <form action="{{ route('flat.store') }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('POST')
        <div class="input-group input-group-sm mb-3 ">
            <label for="title">Titolo</label>
            <input name="title" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{old('title')}}">
        </div>
        <div class="input-group">
            <label for="content">Descrizione</label>
            <textarea name="overview" class="form-control" aria-label="With textarea">{{old('overview')}}</textarea>
        </div>
        <div class="input-group">
            <label for="price">Prezzo</label>
            <input type="number" id="price" name="price" class="form-control" value="{{old('price')}}">
        </div>
        <div class="input-group">
            <label for="rooms">Stanze</label>
            <input type="number" id="rooms" name="rooms" class="form-control" value="{{old('price')}}">
        </div>
        <div class="input-group">
            <label for="beds">Letti</label>
            <input type="number" id="beds" name="beds" class="form-control" value="{{old('beds')}}">
        </div>
        <div class="input-group">
            <label for="baths">Bagni</label>
            <input type="number" id="baths" name="baths" class="form-control" value="{{old('baths')}}">
        </div>
        <div class="input-group">
            <label for="sqm">Metri quadrati</label>
            <input type="number" id="sqm" name="sqm" class="form-control" value="{{old('sqm')}}">
        </div>
        <div class="input-group">
            <label for="address">Indirizzo</label>
            <input v-model="address" type="text" id="address" name="address" class="form-control" value="{{old('address')}}" @keyup="googleAdresses">
        </div>
        
        <!-- Upload an img file  -->
        <div class="form-group">
            <label for="flat_img">Carica un'immagine</label>
            <input type="file" class="form-control-file" id="flat_img" name="image">
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