<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['expired_date', 'flat_id', 'plan_id'];

    public function flat()
    { 
        return $this->belongsTo('App\Flat');
    } 
    
    public function plan()
    { 
        return $this->belongsTo('App\Plan');
    } 
}
