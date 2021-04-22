@extends('layouts.app')

@section('title', 'Airbnb | Dettagli appartamento')

@section('content')
<div class="index_flat_guest">

    <div class="container">
        
        {{-- Immagine appartamento --}}
        <div class="flat_overview">
            <h1>{{$flat->title}}</h1>
            <span>{{$flat->address}}</span>
            <div class="image_overview">
                <img src="{{ asset('storage/'.$flat->flat_img) }}" alt="{{$flat->title}}">
            </div>
        </div>
        
        <div class="flex border_button_finish_flat">
            
            <div class="information_flat">
                
                {{-- Titolo e informazioni stanze... --}}
                <div class="title">
                    <h2>Appartamento - Host: {{$flat->user->name}}</h2>
                    
                    <div class="info_rooms">
                        @if($flat->beds > 1)
                        <span>{{$flat->rooms}} Camere -</span>
                        @else 
                        <span>{{$flat->rooms}} Camera -</span>
                        @endif
                        
                        @if($flat->beds > 1)
                        <span>{{$flat->beds}} Letti -</span>
                        @else 
                        <span>{{$flat->beds}} Letto -</span>
                        @endif
                        
                        @if($flat->baths > 1)
                        <span>{{$flat->baths}} Bagni -</span>
                        @else 
                        <span>{{$flat->baths}} Bagno -</span>
                        @endif
                        
                        <span>{{$flat->sqm}} m&#178;</span>
                    </div>
                    
                </div>
                
                {{-- Dettagli Fissi appartamenti --}}
                <div class="more_info">
                    
                    <div class="flex">
                        <div class="icons_frame">
                            <i class="fas fa-air-freshener"></i>
                        </div>
                        <div>
                            <h3>Pulizia avanzata</h3>
                            <p>Questo host si impegna a seguire la procedura avanzata di pulizia in 5 fasi di Airbnb.</p>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="icons_frame">
                            <i class="fas fa-dog"></i>
                        </div>
                        <div>
                            <h3>Animali domestici ammessi</h3>
                            <p>Questo servizio è molto richiesto dagli ospiti.</p>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="icons_frame">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div>
                            <h3>Regole della casa</h3>
                            <p>L'host vieta di fumare.</p>
                        </div>
                    </div>
                    
                    
                </div>
                
                {{-- Descrizione Appartamento / Se Esiste --}}
                @if ($flat->overview)
                <div class="description">
                    <p>{{$flat->overview}}</p>
                </div>
                @endif
                
                {{-- Servizi --}}
                <div class="flat_services">
                    <h2>Servizi</h2>
                    
                    <div class="flat_services_list">

                        @if(count($flat->services) > 0)
                        @foreach ($flat->services as $item)

                        <div class="service_info">
                            
                            @if($item->id == 1)
                            <div class="icon_services">
                                <i class="fas fa-wifi"></i>
                            </div>
                            <span>{{$item->name}}</span>
                            
                            @elseif($item->id == 2)
                            <div class="icon_services">
                                <i class="fas fa-parking"></i>
                            </div>
                            <span>{{$item->name}}</span>
                            
                            @elseif($item->id == 3)
                            <div class="icon_services">
                                <i class="fas fa-swimming-pool"></i>
                            </div>
                            <span>{{$item->name}}</span>
                            
                            @elseif($item->id == 4)
                            <div class="icon_services">
                                <i class="fas fa-concierge-bell"></i>
                            </div>
                            <span>{{$item->name}}</span>
                            
                            @elseif($item->id == 5)
                            <div class="icon_services">
                                <i class="fas fa-hot-tub"></i>
                            </div>
                            <span>{{$item->name}}</span>
                            
                            @elseif($item->id == 6)
                            <div class="icon_services">
                                <i class="fas fa-water"></i>
                            </div>
                            <span>{{$item->name}}</span>

                            @endif
                            
                        </div>
                        @endforeach
                        @else 
                            <div class="service_info">
                                <div class="icon_services">
                                    <i class="fas fa-ban"></i>
                                </div>
                                <span>Nessun servizio aggiuntivo</span>
                            </div>
                        @endif
                    </div>
                    
                </div>
                
            </div>
            
            {{-- Form Messaggio --}}
            <div class="contact_form">
    
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
    
                <!-- Send message to the owner -->
                <form action="{{ route('send_message', $flat->slug ) }}" method="post" class="form_message">
                    @csrf 
                    @method('POST')
                    <div>
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" value="{{old('email')}}">
                    </div>
                    <div>
                        <label for="message">Messaggio</label>
                        <textarea rows="7" id="message" name="message">{{old('message')}}</textarea>
                    </div>
                    <button type="submit">Invia messaggio</button>

                    {{-- Prezzo --}}
                    <div class="location_price">
                        <h2>Prezzo per notte: {{$flat->price}}€</h2>
                    </div>
                </form>
    
            </div>

        </div>

    </div>

    
</div>



@endsection

@section('map')

<div class="map_flat_container">
    <div class="container">
        
        <h2>Indirizzo</h2>
        <span>{{$flat->address}}</span>

        <div id="map"></div>
        <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.12.0/maps/maps-web.min.js'></script>
        <script>
            var HQ = { lat: {{$flat->lat}}, lng: {{$flat->lng}} };
            var map = tt.map({
                key: 'mGfJKGsowMXK1iso83qv0DUuAL4xlpWN',
                container: 'map',
                center: HQ,
                zoom:15
            });
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());
            var marker = new tt.Marker().setLngLat(HQ).addTo(map);
            var popupOffsets = {
                top: [0, 0],
                bottom: [0, -45],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            }
            var popup = new tt.Popup({offset: popupOffsets}).setHTML("<p><strong>{{$flat->title}}</strong></p><p>{{$flat->address}}</p>");
            marker.setPopup(popup).togglePopup(off);
        </script>

    </div>
</div>
@endsection