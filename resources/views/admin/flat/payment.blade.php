@extends('layouts.dashboard')

@section('title', 'Admin | Sponsor your product')

@section('content')

@if ($just == 0)
<form id="payment-form" action="{{route('payment.store', $id)}}" method="post">
    <!-- Putting the empty container you plan to pass to
      `braintree.dropin.create` inside a form will make layout and flow
      easier to manage -->
    @csrf
    @method('POST')

    <div class="select_plan_payment">
      <label for="ad">Scegli il Piano</label>
      <div class="info_sponsor">Il tuo appartamento verrà messo in primo piano nel sito</div>

      <div class="all_plan">
      @foreach ($types_sponsorship as $sponsorship)
        <div class="type_sponsor">
          <p>Piano: <span>{{$sponsorship->name}}</span></p>
          <p>Prezzo: <span>{{$sponsorship->price}} €</span></p>
          <p>Durata: <span>{{$sponsorship->duration}} Ore</span></p>
        </div>
        @endforeach
      </div>

      {{-- Salva il nome del piano per recuperarlo --}}
      <select name="ad">
      @foreach ($types_sponsorship as $sponsorship)
        <option value="{{$sponsorship->name}}">{{$sponsorship->name}} - {{$sponsorship->price}}€</option>
      @endforeach
      </select>
    </div>

    <input type="hidden" value="{{$id}}" name="flat_id">
    {{-- Non toccare form di braintree --}}
    <div id="dropin-container"></div>
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
    <div class="send">
      <input type="submit"/>
    </div>

</form>

@else
<div class="payment_page">
  <h1>L'appartamento è già sponsorizzato!</h1>
  <a class="button_primary" href="{{ route('flat.index') }}">Ritorna alla lista Appartamenti</a>
</div>
@endif

{{-- Script di braintree --}}
<script type="text/javascript">
    // call braintree.dropin.create code here
      const form = document.getElementById('payment-form');
      braintree.dropin.create({
      authorization: '{{$clientToken}}',
      container: '#dropin-container'
      }, (error, dropinInstance) => {
      if (error) console.error(error);
      form.addEventListener('submit', event => {
          event.preventDefault();
      dropinInstance.requestPaymentMethod((error, payload) => {
      if (error) console.error(error);
      // Step four: when the user is ready to complete their
      //   transaction, use the dropinInstance to get a payment
      //   method nonce for the user's selected payment method, then add
      //   it a the hidden field before submitting the complete form to
      //   a server-side integration
      document.getElementById('nonce').value = payload.nonce;
      form.submit();
    });
    });
    });
  </script>

@endsection