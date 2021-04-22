<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Flat;
use App\Message;

class HomeController extends Controller
{
    public function index()
    {

        $data = [
            // 'flats' => Flat::all()->where('user_id', Auth::id()),
            'lastmessages' => Message::all()->sortBy('created_at')
        ];

        return view('admin.home', $data);
    }

    public function sponsor($id_flat){
        $flatId = Flat::where('id', $id_flat)->first();
        $data = [
            'flat' => $flatId
        ];
        // dd($data); // it worked seamlessly
        return view('admin.sponsor', $data);
    }

    public function statistics($id_flat){
        $flatId = Flat::where('id', $id_flat)->first();
        $data = [
            'flat' => $flatId
        ];
        // dd($data); // it worked seamlessly
        // Ritorna la view statistiche
        return view('admin.statistics', $data);
    }
}
