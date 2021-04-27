<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Flat extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'overview',
        'price',
        'rooms',
        'beds',
        'baths',
        'sqm',
        'address',
        'city',
        'lat',
        'lng',
        'flat_img',
        'visibility',
        'views'
    ];

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function messages() 
    { 
        return $this->hasMany('App\Message'); 
    }

    public function user() 
    { 
        return $this->belongsTo('App\User'); 
    } 

    public function images() 
    { 
        return $this->hasMany('App\Image'); 

    } 

    public function ads() 
    { 
        return $this->hasMany('App\Ad');
    } 


    public function incrementViewCount() { // funzione per evitare che il proprietario del flat incrementi per mano sua le views, la richiamiamo nel guest HomeController
        // dd($this);
        if(Auth::id() != $this->user_id){ // il $this si riferisce allo specifico flat
            $this->views++;
        }
        return $this->save();
    }

}
