<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAlbum extends Model
{
    protected $guarded = [];

    protected $with = 'product';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function rotatory_images()
    {
        return $this->hasMany(RotatoryImage::class, 'product_album_id');
    }
}
