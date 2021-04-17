<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    // use SoftDeletes;
    
    protected $fillable = [
    	'slug', 'title', 'category_id',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    } 
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
