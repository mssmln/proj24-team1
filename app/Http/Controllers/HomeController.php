<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Flat;
use App\Ad;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    { 
        // Passo gli appartamenti sponsorizzati che non siano scaduti, in ordine di scadenza descendente
        return view('guest.home', [ 'ads' => Ad::all()->where('expired_date', '>', date('Y-m-d H:i:s'))->sortByDesc('expired_date')->take(8)]);
    }

    public function search()
    {
        // Passo gli appartamenti sponsorizzati che non siano scaduti, in ordine di scadenza descendente
        return view('guest.search', [ 'ads' => Ad::all()->where('expired_date', '>', date('Y-m-d H:i:s'))->sortByDesc('expired_date')->take(30)]);
    }

    public function flat($slug)
    {
        // Passo solo l'appartamento che ha corrispondenza dello slug nella medesima colonna
        $flatSlug = Flat::where('slug', $slug)->first();
        $flatSlug->incrementViewCount(); // Funzione scritta nel Model Flat che incrementa le view
        
        return view('guest.flat.index' , ['flat' => $flatSlug]);
    }

    public function message()
    {
        // Passo l'ultimo messaggio in ordine di creazione
        return view('guest.message', [ 'message' => Message::orderBy('created_at', 'desc')->first() ]);
    }

    public function send_message(Request $request, Flat $flat, $slug)
    {
        // Validazioni per input del form messaggi
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'message' => 'required|min:1|max:1000'
        ]);

        // Creo un'istanza per un nuovo Messaggio
        $newMessage = new Message();
        $newMessage->fill($request->all());
        $newMessage->flat_id = $flat->where('slug' , $slug)->value('id'); // Passo l'ID dell'appartamento corrispondente
        $newMessage->save();

        return redirect()->route('message');
    }
}
