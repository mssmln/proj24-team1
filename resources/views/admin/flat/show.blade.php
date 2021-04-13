@extends('layouts.dashboard')

@section('title', 'Informazioni Appartamento')

@section('content') 

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Flat</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Desc</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Stanze</th>
                        <th scope="col">Bagni</th>
                        <th scope="col">Letti</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">sqm</th>
                        <th scope="col">visibilità</th>
                        <th scope="col">views</th>
                        <th scope="col">img</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <th scope="row">{{ $flat->id }}</th>
                        <td>{{ $flat->title }}</td>
                        <td>{{ $flat->overview }}</td>
                        <td>{{ $flat->price }}</td>
                        <td>{{ $flat->rooms }}</td>
                        <td>{{ $flat->baths }}</td>
                        <td>{{ $flat->beds }}</td>
                        <td>{{ $flat->address }}</td>
                        <td>{{ $flat->sqm }}</td>
                        <td>{{ $flat->visibility }}</td>
                        <td>{{ $flat->views }}</td>
                        <td><img class="w-25" src="{{ asset('storage/'.$flat->flat_img) }}" alt="{{$flat->title}}"></td>
                        <td class="text-right">
                            <a class="btn btn-info" href="{{ Route('flat.index') }}">Back</a>
                            <a class="btn btn-warning" href="{{ Route('flat.edit',  $flat->id) }}">Edit</a>
                            <form class="d-inline-block" method="post" action="{{ Route('flat.destroy', $flat->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection