@extends('layouts.dashboard')

@section('title', 'Admin | Info Flat')

@section('content')

    <!-- *** TODO: REMOVE *** -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><i class="far fa-image"></i></th>
                <th scope="col"><i class="fas fa-hashtag"></i></th>
                <th scope="col">Titolo</th>
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
                <td><img width="500px" src="{{ asset('storage/'.$flat->flat_img) }}" alt="{{$flat->title}}"></td>
                <th scope="row">{{ $flat->id }}</th>
                <td>{{ $flat->title }}</td>
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
    </table>

@endsection