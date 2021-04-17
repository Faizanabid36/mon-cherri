<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    // use SoftDeletes;

   	protected $fillable =[
    	'size','quantity','amount','delivery_charges', 'product_id',
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
