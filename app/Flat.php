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

    public function services(){
        return $this->belongsToMany('App\Service');
    }
}
