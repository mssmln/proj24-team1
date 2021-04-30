<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Flat;
use App\Flat_Service;


class FlatController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'response' => [
                'flat' =>  Flat::all()
            ]
        ]);
    }
}
