@extends('layouts.dashboard')

@section('title', 'Modifica Appartamento')

@section('content') 
questa è la edit

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('flat.update', $flats->id) }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
        <div class="input-group input-group-sm mb-3 ">
            <label for="title">new flat</label>
            <input name="title" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ $flats->title }}">
        </div>
        <div class="input-group">
            <label for="content">overview</label>
            <textarea name="overview" class="form-control" aria-label="With textarea">{{ $flats->overview }}</textarea>
        </div>
        <div class="input-group">
            <label for="price">price</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ $flats->price }}">
        </div>
        <div class="input-group">
            <label for="rooms">rooms</label>
            <input type="number" id="rooms" name="rooms" class="form-control" value="{{ $flats->rooms }}">
        </div>
        <div class="input-group">
            <label for="beds">beds</label>
            <input type="number" id="beds" name="beds" class="form-control" value="{{ $flats->beds }}">
        </div>
        <div class="input-group">
            <label for="baths">baths</label>
            <input type="number" id="baths" name="baths" class="form-control" value="{{ $flats->baths }}">
        </div>
        <div class="input-group">
            <label for="sqm">sqm</label>
            <input type="number" id="sqm" name="sqm" class="form-control" value="{{ $flats->sqm }}">
        </div>
        <div class="input-group">
            <label for="address">address</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $flats->address }}">
        </div>
        
        <!-- View Img -->
        <div class="form-group">
            <img class="w-50" src="{{asset('storage/'.$flats->flat_img)}}" alt="{{$flats->title}}">
        </div>

        <!-- Update Img -->
        <div class="form-group">
            <label for="flat_img">Update Image</label>
            <input type="file" class="form-control-file" id="flat_img" name="image">
        </div>

    
        <!-- Visibility -->
        @if($flats->visibility)
            <label for="visibility">Click to Hide</label>
            <input type="checkbox" class="switch_1" id="visibility" name="visibility" value="{{$flats->visibility = 0}}">
        @else
            <label for="visibility">Click to show</label>
            <input type="checkbox" class="switch_1" id="visibility" name="visibility" value="{{$flats->visibility = 1}}">
        @endif

        <!-- Area dei servizi  -->
        @foreach($services as $service)
        <div class="form-group form-check">
            <input type="checkbox" class="switch_1"  name="services[]" value="{{$service->id}}" {{$flats->services->contains($service->id) ? 'checked=checked' : ''}}>
            <label class="form-check-label" >{{$service->name}}</label>
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">edit</button>
    </form>
</div>


@endsection