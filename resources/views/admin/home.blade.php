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
    <section class="messages fade-in">

        <div class="message">
            <a href=""><i class="far fa-envelope"></i></a>
            <div class="message-info">
                <p><strong>mail@gmail.com</strong></p>
                <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint non rem minima velit vel amet, exercitationem dolore, explicabo beatae dignissimos natus! Perspiciatis aliquid, maiores nulla harum voluptatum exercitationem at libero?</small></p>
            </div>
            <form action="mailto:someone@example.com" method="post" enctype="text/plain">
                <!-- <input type="submit" value="&#10132;" id="reply-btn"> -->
                <input type="submit" value="&#10140;" id="reply-btn">
            </form>
        </div>

        <div class="message">
            <a href=""><i class="far fa-envelope"></i></a>
            <div class="message-info">
                <p><strong>mail@gmail.com</strong></p>
                <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint non rem minima velit vel amet, exercitationem dolore, explicabo beatae dignissimos natus! Perspiciatis aliquid, maiores nulla harum voluptatum exercitationem at libero?</small></p>
            </div>
            <form action="mailto:someone@example.com" method="post" enctype="text/plain">
                <!-- <input type="submit" value="&#10132;" id="reply-btn"> -->
                <input type="submit" value="&#10140;" id="reply-btn">
            </form>
        </div>

        <div class="message">
            <a href=""><i class="far fa-envelope"></i></a>
            <div class="message-info">
                <p><strong>mail@gmail.com</strong></p>
                <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint non rem minima velit vel amet, exercitationem dolore, explicabo beatae dignissimos natus! Perspiciatis aliquid, maiores nulla harum voluptatum exercitationem at libero?</small></p>
            </div>
            <form action="mailto:someone@example.com" method="post" enctype="text/plain">
                <!-- <input type="submit" value="&#10132;" id="reply-btn"> -->
                <input type="submit" value="&#10140;" id="reply-btn">
            </form>
        </div>

        <div class="message">
            <a href=""><i class="far fa-envelope"></i></a>
            <div class="message-info">
                <p><strong>mail@gmail.com</strong></p>
                <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint non rem minima velit vel amet, exercitationem dolore, explicabo beatae dignissimos natus! Perspiciatis aliquid, maiores nulla harum voluptatum exercitationem at libero?</small></p>
            </div>
            <form action="mailto:someone@example.com" method="post" enctype="text/plain">
                <!-- <input type="submit" value="&#10132;" id="reply-btn"> -->
                <input type="submit" value="&#10140;" id="reply-btn">
            </form>
        </div>
        
    </section>

    <section class="flats">
        <!-- Last 3 Flats created -->
    </section>

    <div class="charts">
        
    </div>
    
</div>
@endsection
