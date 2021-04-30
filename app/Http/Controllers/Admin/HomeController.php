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
        // Passo alcuni dati indicativi per mostrare un'anteprima della pagina
        $data = [
            'flats' => Flat::all()->where('user_id', Auth::id()),
            'lastmessages' => Message::all()->sortBy('created_at')
        ];

        return view('admin.home', $data);
    }

    public function statistics($id_flat)
    {
        $data = [
            'flat' => Flat::where('id', $id_flat)->first(),
            'countMessages' => Message::all()->where('flat_id', $id_flat)
        ];

        // Ritorna la view statistiche Riferita all'appartamento con le informazioni sui messaggi
        return view('admin.statistics', $data);
    }
}
