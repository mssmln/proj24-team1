@extends('layouts.dashboard')

@section('title', 'Inserisci un appartamento')

@section('content') 
questa è la create

<div class="container">
    <form action="{{ route('flat.store') }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('POST')
        <div class="input-group input-group-sm mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">new title</span>
            </div>
            <label for="title"></label>
            <input name="title" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <!-- upload an img file  -->
        <!-- <div class="form-group">
            <label for="img">choose img</label>
            <input type="file" class="form-control-file" id="img" name="image">
        </div> -->
        <!-- / upload an img file  -->
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">body new post</span>
            </div>
            <label for="content"></label>
            <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
        </div>
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