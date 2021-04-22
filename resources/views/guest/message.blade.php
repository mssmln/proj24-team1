@extends('layouts.app')

@section('title', 'Airbnb | Conferma messaggio')

@section('content')
<section class="message_result container fade-in">




    {{-- EVENTUALE SEZIONE DI RIEPILOGO DEL MESSAGGIO INVIATO --}}
    {{-- <div class="message_content">
        <p>La tua mail: {{ $message->email }}</p>
        <p>Riferito all'appartamento: </p>
        <div class="text_message">
            <p><i class="far fa-envelope"></i> : {{ $message->message }}</p>
        </div>


    </div> --}}
</section>

@endsection
