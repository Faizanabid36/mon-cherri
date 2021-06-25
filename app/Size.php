<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    // use SoftDeletes;
    
    protected $fillable = [
    	'size','category_id', 'slug',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
    public function product_variations()
    {
        return $this->hasMany('App\ProductVariation','size_id','id');
    }
}
