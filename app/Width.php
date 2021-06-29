<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Width extends Model
{
    protected $guarded=[];
    
    public function product_variations()
    {
        return $this->hasMany('App\ProductVariation','width_id','id');
    }
}
