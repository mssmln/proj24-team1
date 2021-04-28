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



    public function index(){ 
        return view('guest.home', [ 'ads' => Ad::all()->where('expired_date', '>', date('Y-m-d H:i:s'))->sortByDesc('expired_date')->take(8)]);
    }

    public function search(){
        return view('guest.search', [ 'ads' => Ad::all()->where('expired_date', '>', date('Y-m-d H:i:s'))->sortByDesc('expired_date')->take(30)]);
    }

    public function flat($slug){

        $flatSlug = Flat::where('slug', $slug)->first();
        $flatSlug->incrementViewCount(); // Funzione scritta nel model Flat
        
        return view('guest.flat.index' , ['flat' => $flatSlug]);
    }

    public function message(){
        // $last_message = Message::where(['id'])->latest();
        $last_message = Message::orderBy('created_at', 'desc')->first();

        $data = [
            'message' => $last_message
        ];

        return view('guest.message', $data);
    }

    public function send_message(Request $request, Flat $flat, $slug){

        $request->validate([
            'email' => 'required|email:rfc,dns',
            'message' => 'required|min:1|max:1000'
        ]);

        $id = $flat->where('slug' , $slug)->value('id');

        $newMessage = new Message();
        $newMessage->fill($request->all());
        $newMessage->flat_id = $id;

        $newMessage->save();

        return redirect()->route('message');
    }
}
