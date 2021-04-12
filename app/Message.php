<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $fillable = ['email','message','flat_id'];


    public function flat() 
    { 
        return $this->belongsTo('App\Flat'); 
    } 
}
