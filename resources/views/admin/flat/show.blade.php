@extends('layouts.dashboard')

@section('title', 'Admin | Dettagli appartamento')

@section('content')

<div class="admin_flat_show">

    <div class="visibility">
        @if ($flat->visibility == 1)
        <i class="fas fa-circle visibility-on pulse"></i>
        @else
        <i class="fas fa-circle visibility-off pulse"></i>
        @endif
    </div>
    <p><i class="fas fa-hashtag"></i> <strong>{{ $flat->id }}</strong></p>
    <h1>Titolo: {{ $flat->title }}</h1>
    <p><i class="fas fa-map-marker-alt"></i> {{ $flat->address }}</p>
    <p>Overview: {{ $flat->overview }}</p>
    <p>Rooms: {{ $flat->rooms }} - Baths: {{ $flat->baths }} - Beds: {{ $flat->beds }} - {{ $flat->sqm }} m&#178;</p>
    <p>Price: {{ $flat->price }} €</p>

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