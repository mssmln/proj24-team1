@extends('layouts.dashboard')

@section('title', 'Admin | Sponsor your product')


@section('content')
<h1>Sponsorizzazioni disponibili</h1>

<section class="sponsor fade-in">
    <div class="card">
        <div class="card_info">
            <p><strong>24H</strong></p>
            <div>2.99€</div>
            <button>Buy</button>
        </div>
    </div>
    {{-- / CARD 1 --}}
    <div class="card">
        <div class="card_info">
            <p><strong>72H</strong></p>
            <div>5.99€</div>
            <button>Buy</button>
        </div>
    </div>
    {{-- / CARD 2 --}}
    <div class="card">
        <div class="card_info">
            <p><strong>144H</strong></p>
            <div>9.99€</div>
            <button>Buy</button>
        </div>
    </div>
    {{-- / CARD 3 --}}
</section>



@endsection