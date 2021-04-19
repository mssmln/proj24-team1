@extends('layouts.dashboard')

@section('title', 'Admin | Edit Flat')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('flat.update', $flats->id) }}" method="post" enctype="multipart/form-data" class="admin-form">
    @csrf 
    @method('PUT')

        <!-- Title -->
        <div class="admin-form-inputs">
            <label for="title">Titolo</label>
            <input type="text" id="title" name="title" value="{{ $flats->title }}" autocomplete="off" required>
        </div>

        <!-- Price for night -->
        <div class="admin-form-inputs">
            <label for="price">Prezzo</label>
            <input type="number" id="price" name="price" value="{{ $flats->price }}" autocomplete="off" required>
        </div>
        
        <!-- Rooms N° -->
        <div class="admin-form-inputs">
            <label for="rooms">Stanze</label>
            <input type="number" id="rooms" name="rooms" value="{{ $flats->rooms }}" autocomplete="off" required>
        </div>
        
        <!-- Beds N° -->
        <div class="admin-form-inputs">
            <label for="beds">Letti</label>
            <input type="number" id="beds" name="beds" value="{{ $flats->beds }}" autocomplete="off" required>
        </div>
        
        <!-- Bats N° -->
        <div class="admin-form-inputs">
            <label for="baths">Bagni</label>
            <input type="number" id="baths" name="baths" value="{{ $flats->baths }}" autocomplete="off" required>
        </div>

        <!-- SQM -->
        <div class="admin-form-inputs">
            <label for="sqm">&#13217;</label>
            <input type="number" id="sqm" name="sqm" value="{{ $flats->sqm }}" autocomplete="off">
        </div>

        <!-- Address (to generate all data) -->
        <div class="admin-form-inputs">
            <label for="address">Indirizzo <i @click="tomtomAdresses" class="fas fa-sync-alt"></i></label>
            <input v-model="address" type="text" id="address" value="{{ $flats->address }}" autocomplete="off" required>
        </div>
        
        <!-- Latitude -->
        <div class="admin-form-inputs">
            <label>LAT</label>
            <input readonly="text" name="lat" v-model="lat" class="not-usable">
        </div>

        <!-- Longitude -->
        <div class="admin-form-inputs">
            <label>LNG</label>
            <input readonly="text" name="lng" v-model="lng" class="not-usable">
        </div>

        <!-- Address Name -->
        <div class="admin-form-inputs">
            <label>Via</label>
            <input disabled="disabled" readonly="text" v-model="via" class="not-usable">
        </div>

        <!-- Address N° -->
        <div class="admin-form-inputs">
            <label>N°</label>
            <input disabled="disabled" readonly="text" v-model="numero" class="not-usable">
        </div>

        <!-- CAP -->
        <div class="admin-form-inputs">
            <label>CAP</label>
            <input disabled="disabled" readonly="text" v-model="cap" class="not-usable">
        </div>

        <!-- Municipality -->
        <div class="admin-form-inputs">
            <label>Comune</label>
            <input readonly="text" name="city" v-model="comune" class="not-usable">
        </div>

        <!-- Province -->
        <div class="admin-form-inputs">
            <label>Provincia</label>
            <input disabled="disabled" readonly="text" v-model="provincia" class="not-usable">
        </div>

        <!-- Region -->
        <div class="admin-form-inputs">
            <label>Regione</label>
            <input disabled="disabled" readonly="text" v-model="regione" class="not-usable">
        </div>

        <!-- Country -->
        <div class="admin-form-inputs">
            <label>Paese</label>
            <input disabled="disabled" readonly="text" v-model="paese" class="not-usable">
        </div>
        
        <!-- Address generated -->
        <div class="admin-form-inputs">
            <label>Indirizzo</label>
            <input readonly="text" type="text" id="address" name="address" v-model="indirizzo" class="not-usable">
        </div>

        <!-- Upload an image file  -->
        <div class="admin-form-inputs">
            <label for="flat_img" >Image</label>
            <div>
                <img src="{{asset('storage/'.$flats->flat_img)}}" alt="{{$flats->title}}">
            </div>
            <input type="file" id="flat_img" class="input-file" name="image">
        </div>

        <!-- Overview  -->
        <div class="admin-form-inputs">
            <label for="overview">Descrizione</label>
            <textarea name="overview">{{ $flats->overview }}</textarea>
        </div>

        <div class="form-inputs switch">
            <!-- Services -->
            @foreach($services as $service)
            <div class="admin-form-inputs switch">
            <input type="checkbox" class="switch_1"  name="services[]" value="{{$service->id}}" {{$flats->services->contains($service->id) ? 'checked=checked' : ''}}>
                <label>{{$service->name}}</label>
            </div>
            @endforeach

            <!-- Visibility -->
            @if($flats->visibility)
            <input type="checkbox" class="switch_1" id="visibility" name="visibility" value="{{$flats->visibility = 0}}">
            <label for="visibility">Non visibile <em>(modificabile in seguito)</em></label>
            @else
            <input type="checkbox" class="switch_1" id="visibility" name="visibility" value="{{$flats->visibility = 1}}">
            <label for="visibility">Visibile <em>(modificabile in seguito)</em></label>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit"><i class="fas fa-edit"></i></button>
    </form>

@endsection