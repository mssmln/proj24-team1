@extends('layouts.dashboard')

@section('content')
<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <h1>DASHBOARD</h1>

    <section class="charts">
        <!-- some charts with some data -->
    </section>

    <section class="messages">
        <!-- Last 3 Messages received -->
    </section>

    <section class="flats">
        <!-- Last 3 Flats created -->
    </section>
    
</div>
@endsection
