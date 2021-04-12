<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'lat',
        'lng',
        'flat_img',
        'visibility',
        'views'
    ];

    public function user() 
    { 
        return $this->belongsTo('App\User'); 
    } 

    public function images() 
    { 
        return $this->hasMany('App\Image'); 

    } 
}
