<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
    public function valida(Request $request)
    {
        $request->validate(
        [
            // Validazioni input server-side appartamenti
            'title' => 'required|unique:flats',
            'overview' => 'nullable',
            'price' => 'required|numeric|min:1|max:10000',
            'rooms' => 'required|numeric|min:1|max:100',
            'beds' => 'required|numeric|min:1|max:100',
            'baths' => 'required|numeric|min:1|max:100',
            'sqm' => 'required|numeric|min:1|max:10000',
            'address' => 'required|string',
            'flat_img' => 'mimes:png,jpg,gif',
            'visibility' => 'boolean'
        ]);
    }

    public function index()
    {
        // Prendo tutti gli appartamenti con userID uguale all'ID del utente Autenticato
        return view('admin.flat.index', [ 'flats' => Flat::all()->where('user_id', Auth::id()) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Aggiungo tutti i servizi possibili
        return view('admin.flat.create', [ 'services' => Service::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Richiamo la funzione per validare i dati inseriti
        $this->valida($request);
        // Mi salvo la richiesta in una variabile
        $data = $request->all();

        // Nuova istanza per creare l'appartamento
        $newFlat = new Flat();
        $newFlat->user_id = Auth::id();
        $newFlat->slug = Str::slug($data['title']);
        $data['flat_img'] = Storage::put('flat_covers', $data['image']);
        $newFlat->flat_img = $data['flat_img'];
        $newFlat->fill($data);
        $newFlat->save();

        // Dal form passo un array di servizi, allora gli dico che se la richiesta contiene la chiave services, aggiungi al flat i servizi selezionati
        if(array_key_exists('services', $data))
        {
            $newFlat->services()->sync($data['services']);
        }

        // Ritorno alla pagina con un messaggio che indica se tutto è andato a buon fine
        return redirect()->route('flat.index')->with('status', 'Appartamento Creato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Flat $flat)
    {
        // Mostro il singolo appartamento selezionato
        return view('admin.flat.show', [ 'flat' => $flat ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flat $flat)
    {
        // Passo i dati dell'appartamento e di tutti i servizi da modificare
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
        $request->validate(
            [
                // Validazioni input modifica 
                'title' => ['required', Rule::unique("flats")->ignore($flat)], // La regola Rule::unique, ignora il title unique in modo da non dare errore se rimane invariato
                'overview' => 'nullable',
                'price' => 'required|numeric|min:1|max:10000',
                'rooms' => 'required|numeric|min:1|max:100',
                'beds' => 'required|numeric|min:1|max:100',
                'baths' => 'required|numeric|min:1|max:100',
                'sqm' => 'required|numeric|min:1|max:10000',
                'address' => 'required|string',
                'flat_img' => 'mimes:png,jpg,gif',
                'visibility' => 'boolean',
            ]);


        // Controllo se lo slug della richiesta è cambiato rispetto a quello già salvato, in modo da dirgli di cambiarlo 
        if($data['title'] != $flat->title)
        {
            $data['slug'] = Str::slug($data['title']);
        }

        // Controllo if per evitare l'errore del undefined index image
        if(array_key_exists('image',$data))
        {
            $data['flat_img'] = Storage::put('flat_covers', $data['image']);
        }

        // Come per la store controllo l'array che passo, ed aggiorno i servizi modificati
        if(array_key_exists('services',$data))
        {
            $flat->services()->sync($data['services']);
        }

        // Salvo le modifiche
        $flat->update($data);

        // Ritorno alla pagina con un messaggio che indica se tutto è andato a buon fine
        return redirect()->route('flat.show', $flat)->with('status', 'Appartamento Modificato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        // Svuoto l'array dei servizi che ho passato per quell'appartamento, in modo da svuotare la pivot nel DB
        $flat->services()->sync([]);
        // Cancello i dati
        $flat->delete();

        // Ritorno alla pagina con un messaggio che indica se tutto è andato a buon fine
        return redirect()->route('flat.index')->with('status', 'Appartamento Eliminato');
    }
}
