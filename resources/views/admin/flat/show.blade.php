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

    <div class="flex">

        <div class="info_admin_show_flat">
            <h1>{{ $flat->title }}</h1>
            <div class="image_admin_show">
                <img src="{{asset('storage/'.$flat->flat_img)}}" alt="Anteprima appartamento">
            </div>
        
            <div class="admin_show_description">
                <p>Descrizione: {{ $flat->overview }}</p>
            </div>
            
            <div class="admin_show_price">
                <p>Stanze: {{ $flat->rooms }} - Bagni: {{ $flat->baths }} - Letti: {{ $flat->beds }} - {{ $flat->sqm }} m&#178;</p>
                <p><i class="fas fa-map-marker-alt"></i> {{ $flat->address }} - {{$flat->city}}</p>
                <p>Prezzo per Notte: {{ $flat->price }}€</p>
            </div>
        </div>
    
        <div class="list_show_message">

            <div class="services">
                <h2>Servizi</h2>
                @if(count($flat->services) > 0)
                @foreach ($flat->services as $item)
                <div class="service_info">
                    
                    @if($item->id == 1)
                    <div class="icon_services">
                        <span>{{$item->name}}</span>
                    </div>
                    
                    @elseif($item->id == 2)
                    <div class="icon_services">
                        <span>{{$item->name}}</span>
                    </div>
                    
                    @elseif($item->id == 3)
                    <div class="icon_services">
                        <span>{{$item->name}}</span>
                    </div>
                    
                    @elseif($item->id == 4)
                    <div class="icon_services">
                        <span>{{$item->name}}</span>
                    </div>
                    
                    @elseif($item->id == 5)
                    <div class="icon_services">
                        <span>{{$item->name}}</span>
                    </div>
                    
                    @elseif($item->id == 6)
                    <div class="icon_services">
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

            <section class="last_things_show fade-in">
            @foreach ($flat->messages as $item)
                <div class="thing">
                    <div class="flex_center">
                        <i class="far fa-envelope"></i>
                        <div class="thing-info">
                            <p><strong>{{ $item->email }}</strong></p>
                            <p><small>{{ $item->message }}</small></p>
                            <p><small><em>{{ $item->created_at }}</em></small></p>
                        </div>
                    </div>
                    <form action="mailto:{{ $item->email }}" method="post" enctype="text/plain">
                        <!-- <input type="submit" value="&#10132;" id="reply-btn"> -->
                        <input type="submit" value="&#10140;" id="reply-btn" title="Rispondi">
                    </form>
                </div>
             @endforeach
            </section>
        </div>
    </div>

</div>
@endsection