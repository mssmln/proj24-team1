@extends('layouts.dashboard')

@section('title', 'Admin | Dettagli appartamento')

@section('content')

<div class="admin_flat_show">

    <div class="visibility_admin_show">
        @if ($flat->visibility == 1)
        <i class="fas fa-circle visibility-on pulse"></i>
        @else
        <i class="fas fa-circle visibility-off pulse"></i>
        @endif
        <p><i class="fas fa-hashtag"></i> <strong>{{ $flat->id }}</strong></p>
    </div>

    <div class="image_admin_show">
        <img src="{{asset('storage/'.$flat->flat_img)}}" alt="Anteprima appartamento">
    </div>
    <h1>{{ $flat->title }}</h1>

    <div class="admin_show_description">
        <p>Descrizione: {{ $flat->overview }}</p>
        <p>Stanze: {{ $flat->rooms }} - Bagni: {{ $flat->baths }} - Letti: {{ $flat->beds }} - {{ $flat->sqm }} m&#178;</p>
    </div>
    
    <div class="admin_show_price">
        <p><i class="fas fa-map-marker-alt"></i> {{ $flat->address }} - {{$flat->city}}</p>
        <p>Prezzo per Notte: {{ $flat->price }}€</p>
    </div>
    
    <div class="services">

        @if(count($flat->services) > 0)
        @foreach ($flat->services as $item)
        <div class="service_info">
            
            @if($item->id == 1)
            <div class="icon_services">
                <i class="fas fa-wifi"></i>
                <span>{{$item->name}}</span>
            </div>
            
            @elseif($item->id == 2)
            <div class="icon_services">
                <i class="fas fa-parking"></i>
                <span>{{$item->name}}</span>
            </div>
            
            @elseif($item->id == 3)
            <div class="icon_services">
                <i class="fas fa-swimming-pool"></i>
                <span>{{$item->name}}</span>
            </div>
            
            @elseif($item->id == 4)
            <div class="icon_services">
                <i class="fas fa-concierge-bell"></i>
                <span>{{$item->name}}</span>
            </div>
            
            @elseif($item->id == 5)
            <div class="icon_services">
                <i class="fas fa-hot-tub"></i>
                <span>{{$item->name}}</span>
            </div>
            
            @elseif($item->id == 6)
            <div class="icon_services">
                <i class="fas fa-water"></i>
                <span>{{$item->name}}</span>
            </div>
            @endif
        </div>
        @endforeach

        @else 

        <div class="service_info">
            <div class="icon_services">
                <i class="fas fa-ban"></i>
                <span>Nessun servizio aggiuntivo</span>
            </div>
        </div>

        @endif
    </div>
@endsection