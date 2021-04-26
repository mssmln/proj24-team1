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


    <!-- *** TODO: REMOVE *** -->
    <!-- <table class="table">
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-hashtag"></i></th>
                <th scope="col">Desc</th>
                <th scope="col"><i class="fas fa-dollar-sign"></i></th>
                <th scope="col">Stanze</th>
                <th scope="col"><i class="fas fa-bath"></i></th>
                <th scope="col"><i class="fas fa-bed"></i></th>
                <th scope="col"><i class="fas fa-map-marker-alt"></i></th>
                <th scope="col">sqm</th>
                <th scope="col">visibilità</th>
                <th scope="col"><i class="far fa-eye"></i></th>
                <th scope="col">CREATED AT</th>
                <th scope="col">UPDATED AT</th>
                <th scope="col"><i class="fas fa-tools"></i></th>
            </tr>
        </thead>
        <tbody> 
            <tr>
                <th scope="row">{{ $flat->id }}</th>
                <td>{{ $flat->overview }}</td>
                <td>{{ $flat->price }}</td>
                <td>{{ $flat->rooms }}</td>
                <td>{{ $flat->baths }}</td>
                <td>{{ $flat->beds }}</td>
                <td>{{ $flat->address }}</td>
                <td>{{ $flat->sqm }}</td>
                <td scope="row">
                    @if ($flat->visibility == 1)
                    <i class="fas fa-circle visibility-on pulse"></i>
                    @else
                    <i class="fas fa-circle visibility-off pulse"></i>
                    @endif
                </td>
                <td>{{ $flat->views }}</td>
                <td>{{ $flat->created_at }}</td>
                <td>{{ $flat->updated_at }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ Route('flat.edit',  $flat->id) }}"><i class="fas fa-edit"></i></a>
                    <form class="form-delete" method="post" action="{{ Route('flat.destroy', $flat->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table> -->

</div>

@endsection