<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Flat;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
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
