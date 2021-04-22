@extends('layouts.app')

@section('title', 'manda un messaggio')


@section('content')
<section class="message_result container">
    <div class="message_title">
        <h2>Il messaggio è stato inviato correttamente</h2>
        <i class="far fa-check-circle"></i>
    </div>




    {{-- EVENTUALE SEZIONE DI RIEPILOGO DEL MESSAGGIO INVIATO --}}
    {{-- <div class="message_content">
        <p>La tua mail: {{ $message->email }}</p>
        <p>Riferito all'appartamento: </p>
        <div class="text_message">
            <p>Messaggio:</p>
            {{ $message->message }}

        </div>


    </div> --}}
</section>

@endsection
