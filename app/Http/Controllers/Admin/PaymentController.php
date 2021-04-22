<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Flat;
use App\Plan;
use App\Ad;
use Braintree;


class PaymentController extends Controller
{
    // LA funzione restituisce il gateway per non ripeterla piu volte
    private function getGateway(){

    // Per rendere i dati safe prima di arrivare qui passano dal config/services ed ancora prima dall'env
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    return $gateway;

    }


    public function index($id){
        
        // Passo i dati al form per la convalida e selezionare il tipo di sponsor
        $gateway = $this->getGateway();
        $clientToken = $gateway->clientToken()->generate();
        $types_sponsorship = Plan::all();     
        
        return view('admin.flat.payment', compact('clientToken', 'types_sponsorship', 'id'));
    }

    public function payment(Request $request){

        $gateway = $this -> getGateway();
        $types_sponsorship = Plan::all();

        // Cerco il tipo di sponsorizzazione
        foreach($types_sponsorship as $sponsorship){
            if( $request->ad == $sponsorship->name){
                // Salvo il tipo di sponsor
                $sponsorship_choose = $sponsorship;
                // Salva il prezzo , Serve??
                $price = strval($sponsorship->price);
            }
        }

    
        // Pagamento Cosi come lo chiede Braintree
        $result = $gateway->transaction()->sale([
            'amount' => $price, // prezzo
            'paymentMethodNonce'=>$request->payment_method_nonce, // metodo di pagamento
            'options' => [
              'submitForSettlement' => True
            ]
        ]);

        if($result){

            // Salvo in modo barbaro la data di oggi senza ora perchè non ricordo come fare
            $date_now = date_create( date('Y-m-d') );

            // dd($date_now);

            // Volevo creare un data di fine ma non ho nemmeno fatto i test come si deve
            // if($sponsorship_choose->duration == '24'){
            //     $end_date = date_add($date_now,date_interval_create_from_date_string("1 days"));
            // }

            // elseif($sponsorship_choose-> duration == '72'){
            //     $end_date = date_add($date_now,date_interval_create_from_date_string("3 days"));
            // }

            // elseif($sponsorship_choose->duration == '144'){
            //     $end_date = date_add($date_now,date_interval_create_from_date_string("6 days"));
            // }


            // Creo l'istanza per popolare la tabella
            $new_sponsorship = new Ad();
            /* start datE? */
            /* END DATE? */
            $new_sponsorship->plan_id =  $sponsorship_choose->id;
            $new_sponsorship->flat_id = $request->flat_id;
            $new_sponsorship->expired_date = date('Y-m-d'); //$end_date
            $new_sponsorship->save();

        }
        return redirect()->route('home');
    }

}
