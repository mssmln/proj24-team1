<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Flat;

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
        return view('guest.home');
    }

    public function search(){
        return view('guest.search');
    }

    public function flat(){
        
        return view('guest.flat.index');
    }

    public function message(){
        return view('guest.message');
    }

    public function send_message(Request $request){


        $request->validate([
            'email' => 'required|email:rfc,dns',
            'message' => 'required|min:1|max:1000'
        ]);

        // dd($data); it worked smoothly
        $newMessage = new Message();
        // $newMessage->flat_id = $flat->id;
        $newMessage->fill($request->all());
        $newMessage->save();
        

        return redirect()->route('message');
    }


}
