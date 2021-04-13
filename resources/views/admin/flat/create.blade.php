@extends('layouts.dashboard')

@section('title', 'Inserisci un appartamento')

@section('content') 
questa è la create

<div class="container">
    <form action="{{ route('flat.store') }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('POST')
        <div class="input-group input-group-sm mb-3 ">
            <label for="title">new flat</label>
            <input name="title" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group">
            <label for="content">overview</label>
            <textarea name="overview" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div class="input-group">
            <label for="price">price</label>
            <input type="number" id="price" name="price" class="form-control">
        </div>
        <div class="input-group">
            <label for="rooms">rooms</label>
            <input type="number" id="rooms" name="rooms" class="form-control">
        </div>
        <div class="input-group">
            <label for="beds">beds</label>
            <input type="number" id="beds" name="beds" class="form-control">
        </div>
        <div class="input-group">
            <label for="baths">baths</label>
            <input type="number" id="baths" name="baths" class="form-control">
        </div>
        <div class="input-group">
            <label for="sqm">sqm</label>
            <input type="number" id="sqm" name="sqm" class="form-control">
        </div>
        <div class="input-group">
            <label for="address">address</label>
            <input type="text" id="address" name="address" class="form-control">
        </div>
        
        <!-- upload an img file  -->
        <div class="form-group">
            <label for="flat_img">choose flat_img</label>
            <input type="file" class="form-control-file" id="flat_img" name="image">
        </div>
        <!-- / upload an img file  -->
        <!-- visibility -->
        <label for="visibility">click to hide it </label>
        <input type="checkbox" id="visibility" name="visibility" value="0">
        <!-- / visibility -->
        <!-- area dei servizi  -->
        @foreach($services as $service)
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input"  name="services[]" value="{{$service->id}}">
            <label class="form-check-label" >{{$service->name}}</label>
        </div>
        @endforeach
        <!-- / area dei servizi  -->
        <button type="submit" class="btn btn-success">create</button>
    </form>
</div>


@endsection