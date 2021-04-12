<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable = [
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
}
