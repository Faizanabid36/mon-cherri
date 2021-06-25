<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $guarded=[];
    
    protected $with=['colors'];
    public function products()
    {
        return $this->belongsToMany('App\Product','product_variations','variation_id','product_id','');
    }
    public function colors()
    {
        return $this->belongsTo('App\Color','color','id');
    }
    public function product_variations()
    {
        return $this->hasMany('App\ProductVariation','variation_id','id');
    }
}
