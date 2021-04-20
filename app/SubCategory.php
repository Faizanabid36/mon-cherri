<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    // use SoftDeletes;
    
    protected $fillable = [
        'title','slug','category_id'
    ];
    public function products()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
    public function subsubcategories()
    {
    	return $this->hasMany('App\SubSubCategory');
    }
}
