<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $guarded=[];
    
    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function variation()
    {
        return $this->belongsTo('App\Variation','variation_id','id');
    }
    public function color()
    {
        return $this->belongsTo('App\Color','color_id','id');
    }

    public function size()
    {
        return $this->belongsTo('App\Size','size_id','id');
    }
    public function certificate()
    {
        return $this->belongsTo('App\Certificate','certificate_id','id');
    }
    public function album()
    {
        return $this->belongsTo('App\ProductAlbum', 'album_id','id');
    }
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
