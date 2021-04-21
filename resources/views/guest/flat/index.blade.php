@extends('layouts.app')

@section('title', 'flat in details')


@section('content')
view flat in details
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<form action="{{ route('send_message') }}" method="post">
    @csrf 
    @method('POST')
        <div class="input-group input-group-sm mb-3 ">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{old('email')}}">
        </div>
        <div class="input-group">
            <label for="message">Messaggio</label>
            <textarea name="message" class="form-control" aria-label="With textarea">{{old('message')}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Invia messaggio</button>
    </form>

@endsection