<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Flat;
use App\Service;


class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    // validations
    public function validate(Request $request){
        $request->validate([
            // flat
            'title' => 'required',
            'overview' => 'nullable',
            'price' => 'required',
            'rooms' => 'required',
            'beds' => 'required',
            'baths' => 'required',
            'sqm' => 'required',
            'address' => 'required',
            'flat_img' => 'required',
            'visibility' => 'required',
            // / flat
        ]);
    }









    public function index()
    {

        $data = [ 
            'flats' => Flat::all()->where('user_id', Auth::id())
        ]; 

        return view('admin.flat.index',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'services' => Service::all()
        ];
        return view('admin.flat.create', $data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data); it worked smoothly
        $newFlat = new Flat();
        $newFlat->user_id = Auth::id();
        $newFlat->slug = Str::slug($data['title']);
        $data['flat_img'] = Storage::put('flat_covers', $data['image']);
        $newFlat->flat_img = $data['flat_img'];
        $newFlat->fill($data);
        $newFlat->save();

        //Se la chiave esiste allora compili la pivot
        if(array_key_exists('services', $data)){
            $newFlat->services()->sync($data['services']);
        }

        return redirect()->route('flat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Flat $flat)
    {

        $data = [
            'flat' => $flat
        ];

        return view('admin.flat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flat $flat)
    {
        $data = [
            'flats' => $flat,
            'services' => Service::all()
        ];

        return view('admin.flat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flat $flat)
    {
        $data = $request->all();

        // Controllo if per update slug solo se cambia il title
        if($data['title'] != $flat->title){
            $data['slug'] = Str::slug($data['title']);
        }

        // Controllo if per evitare l'errore del undefined index image
        if(array_key_exists('image',$data)){
            $data['flat_img'] = Storage::put('post_covers', $data['image']); 
        }

        // Aggiorna i servizi modificati
        if(array_key_exists('services',$data)){
            $flat->services()->sync($data['services']);
        }
        
        $flat->update($data);

        return redirect()->route('flat.show', $flat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        $flat->services()->sync([]);
        $flat->delete();

        return redirect()->route('flat.index');
    }
}
