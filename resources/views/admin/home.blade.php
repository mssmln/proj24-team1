@extends('layouts.dashboard')

@section('title', 'Admin | Dashboard')

@section('content')
<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <h1>&#128075; Hi, {{ Auth::user()->name . ' ' . Auth::user()->surname }} </h1>

    <!-- TODO: equal format for each -->
    <!-- <input type="text" placeholder="Search"> -->

    <!-- <section class="charts">
        <canvas id="line" height="320"></canvas>
        <canvas id="line" height="320"></canvas>
    </section> -->

    <!-- Last two or four messages received -->
    <section class="last-things fade-in">

        @foreach ($message as $messages)
            <div class="thing">
            <a href=""><i class="far fa-envelope"></i></a>
            <div class="thing-info">
                <p><strong>{{ $message->email }}</strong></p>
                <p><small>{{ $message->message }}</small></p>
            </div>
            <form action="mailto:someone@example.com" method="post" enctype="text/plain">
                <!-- <input type="submit" value="&#10132;" id="reply-btn"> -->
                <input type="submit" value="&#10140;" id="reply-btn">
            </form>
        </div>
        @endforeach
        
    </section>

    <section class="last-things fade-in">
        <div class="thing">
            <a href=""><i class="far fa-eye"></i></a>
            <div class="thing-info">
                <p><strong>98355846</strong></p>
            </div>
        </div>
    </section>

    <section class="flats">
        <!-- Last 3 Flats created -->
    </section>

    <!-- <div class="charts">

        <canvas id="myChart"></canvas>

    </div> -->
    
</div>
@endsection
