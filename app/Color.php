<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
	// use SoftDeletes;
	
	protected $fillable = [
    	'color', 'code', 'slug'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}