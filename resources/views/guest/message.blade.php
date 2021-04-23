@extends('layouts.app')

@section('title', 'Airbnb | Conferma messaggio')

@section('content')
<section class="message_result container fade-in">



        
    <div class="message_content">
        <p><strong>{{ $message->email }}</strong></p>
        <p><i class="fas fa-home"></i> : {{ $message->flat_id }}</p>
        <div class="text_message">
            <p><i class="far fa-envelope"></i> : {{ $message->message }}</p>
        </div>


    </div> --}}
</section>

@endsection
