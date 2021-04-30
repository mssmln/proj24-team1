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
    // La funzione restituisce il gateway per non ripeterla piu volte
    private function getGateway()
    {
        // Per rendere i dati safe prima di arrivare qui passano dal config/services ed ancora prima dall'env
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        return $gateway;
    }

    public function index($id)
    {
        // Controllo che l'appartamento non sia ancora sponsorizzato
        $cout = 0;
        // La variabile just, servirà per capire se l'appartamento è gia sponsorizzato
        $just = 0;
        $sponsorships = Ad::all()->where('flat_id', $id);
        $current_date = strtotime( date('Y-m-d H:i:s') ); 
        
        foreach($sponsorships as $sponsors)
        {
            // Trasformo la data in una stringa per compararla facilmente
            if( $current_date < strtotime($sponsors->expired_date)){
                $just = 1;
                break;
            }
            $cout += 1;
        }
        
        //Richiamo il geteway
        $gateway = $this->getGateway();
        // Creo il token
        $clientToken = $gateway->clientToken()->generate();
        // Prendo tutti i piani abbonamento esistenti
        $types_sponsorship = Plan::all();
        
        // Passo i dati al form per la convalida e la selezione del tipo di sponsorizzazione
        return view('admin.flat.payment', compact('clientToken', 'types_sponsorship', 'id', 'just'));
    }

    public function payment(Request $request)
    {
        // Richiamo il Gateway e tuti i piani abbonamento
        $gateway = $this->getGateway();
        $types_sponsorship = Plan::all();

        // Cerco il tipo di sponsorizzazione
        foreach($types_sponsorship as $sponsorship)
        {
            if( $request->ad == $sponsorship->name)
            {
                // Salvo il tipo di sponsor
                $sponsorship_choose = $sponsorship;
                // Salva il prezzo per il result che richiede Braintree
                $price = strval($sponsorship->price);
            }
        }

        // Pagamento Cosi come lo chiede Braintree
        $result = $gateway->transaction()->sale([
            'amount' => $price, // Prezzo
            'paymentMethodNonce'=>$request->payment_method_nonce, // Metodo di pagamento
            'options' => [
              'submitForSettlement' => True
            ]
        ]);

        // Se il pagamento va a buon fine
        if($result)
        {
            // Salvo la data di oggi nel formato adatto
            $date_now = date_create( date('Y-m-d H:i:s') );

            // Creo una data di fine abbonamento partendo dalla data corrente ed aggiungendo le giuste ore
            if($sponsorship_choose->duration == '24')
            {
                $end_date = date_add($date_now,date_interval_create_from_date_string("1 days"));
            }
            elseif($sponsorship_choose-> duration == '72')
            {
                $end_date = date_add($date_now,date_interval_create_from_date_string("3 days"));
            }
            elseif($sponsorship_choose->duration == '144')
            {
                $end_date = date_add($date_now,date_interval_create_from_date_string("6 days"));
            }

            // Creo l'istanza per popolare la tabella Ad
            $new_sponsorship = new Ad();
            $new_sponsorship->plan_id =  $sponsorship_choose->id; // ID del tipo di piano ricavato da riga 66
            $new_sponsorship->flat_id = $request->flat_id; // ID appartamento richiesto da sponsorizzare
            $new_sponsorship->expired_date = $end_date; //$end_date
            $new_sponsorship->save();
            
        }
        // Ritorno la pagina con un stato di conferma o non
        return redirect()->route('flat.index')->with('status', 'Pagamento Effettuato');
    }

}
