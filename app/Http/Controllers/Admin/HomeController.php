<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Flat;
use App\Message;

class HomeController extends Controller
{
    public function index()
    {

        $data = [
            'message' => Message::orderBy('created_at', 'desc')->first()
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
