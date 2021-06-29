<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $guarded = [];
    public function product_variations()
    {
        return $this->hasMany('App\ProductVariation','certificate_id','id');
    }
}
