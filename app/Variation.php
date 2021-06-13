<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $guarded=[];

    public function products()
    {
        return $this->belongsToMany('App\Product','product_variations','variation_id','product_id','');
    }
}
