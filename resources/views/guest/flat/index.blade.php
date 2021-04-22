@extends('layouts.app')

@section('title', 'flat in details')


@section('content')
<div class="index_flat_guest">

    {{-- <p>{{$flat}}</p> --}}

    <div class="container">

        {{-- Immagine appartamento --}}
        <div class="flat_overview">
            <div class="image_overview">
                <img src="{{ asset('storage/'.$flat->flat_img) }}" alt="{{$flat->title}}">
            </div>
        </div>

        <div class="flex">

            <div class="information_flat">

                {{-- Titolo e informazioni stanze... --}}
                <div class="title">
                    <h1>{{$flat->title}}</h1>

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
                        @foreach ($flat->services as $item)
                            <div class="service_info">

                                @if($item->id == 1)
                                <div class="icon_services">
                                    <i class="fas fa-wifi"></i>
                                </div>
                                <span>{{$item->name}}</span>
                                @endif

                                @if($item->id == 2)
                                <div class="icon_services">
                                    <i class="fas fa-parking"></i>
                                </div>
                                <span>{{$item->name}}</span>
                                @endif

                                @if($item->id == 3)
                                <div class="icon_services">
                                    <i class="fas fa-swimming-pool"></i>
                                </div>
                                <span>{{$item->name}}</span>
                                @endif

                                @if($item->id == 4)
                                <div class="icon_services">
                                    <i class="fas fa-concierge-bell"></i>
                                </div>
                                <span>{{$item->name}}</span>
                                @endif

                                @if($item->id == 5)
                                <div class="icon_services">
                                    <i class="fas fa-hot-tub"></i>
                                </div>
                                <span>{{$item->name}}</span>
                                @endif

                                @if($item->id == 6)
                                <div class="icon_services">
                                    <i class="fas fa-water"></i>
                                </div>
                                <span>{{$item->name}}</span>
                                @endif

                            </div>
                        @endforeach
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
                        @guest
                        <input name="email" id="email" type="email" value="{{old('email')}}">

                        @else
                        <input name="email" id="email" type="email" value="{{ Auth::user()->email }}">
                        @endguest
                    </div>
                    <div>
                        <label for="message">Messaggio</label>
                        <textarea rows="7" id="message" name="message">{{old('message')}}</textarea>
                    </div>
                    <button type="submit">Invia messaggio</button>
                </form>

            </div>

        </div>


    </div>





</div>


@endsection
