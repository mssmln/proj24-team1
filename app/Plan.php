<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'price', 'duration',
    ];
    public function ads() 
    { 
        return $this->hasMany('App\Ad');
    } 
}
