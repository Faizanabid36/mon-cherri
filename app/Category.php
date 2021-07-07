<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use SoftDeletes;
    
    protected $fillable = ['title','slug','image'];
    
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function subcategories()
    {
        return $this->hasMany('App\SubCategory');
    }
    public function brands()
    {
    	return $this->hasMany('App\Brand');
    }
   
}
