@extends('layouts.dashboard')

@section('title', 'Admin | Info Flat')

@section('content')

    <div class="admin-flat-show">
        
        <div class="visibility">
            @if ($flat->visibility == 1)
            <i class="fas fa-circle visibility-on pulse"></i>
            @else
            <i class="fas fa-circle visibility-off pulse"></i>
            @endif
        </div>

        <h1 class="title">{{ $flat->title }}</h1>

        <p class="address"><i class="fas fa-map-marker-alt"></i> {{ $flat->address }}</p>

        <div class="cover">
            <img src="{{ asset('storage/'.$flat->flat_img) }}" alt="Image of: {{$flat->title}}" width="100%">
        </div>

        <p class="infos">{{ $flat->rooms }} Rooms - {{ $flat->baths }} Baths - {{ $flat->beds }} Beds - {{ $flat->sqm }} M&#178;</p>

        <div class="overview">
            <p>{{$flat->overview}}</p>
        </div>

        <div class="flat_services">
        
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><i class="fas fa-hashtag"></i></th>
                    <th scope="col"><i class="fas fa-dollar-sign"></i></th>
                    <th scope="col"><i class="fas fa-person-booth"></i></th>
                    <th scope="col"><i class="fas fa-bath"></i></th>
                    <th scope="col"><i class="fas fa-bed"></i></th>
                    <th scope="col">M&#178;</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <th scope="row">{{ $flat->id }}</th>
                    <td>{{ $flat->price }} €</td>
                    <td>{{ $flat->rooms }}</td>
                    <td>{{ $flat->baths }}</td>
                    <td>{{ $flat->beds }}</td>
                    <td>{{ $flat->sqm }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ Route('flat.edit',  $flat->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" method="post" action="{{ Route('flat.destroy', $flat->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
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

@endsection