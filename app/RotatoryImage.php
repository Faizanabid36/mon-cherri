<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RotatoryImage extends Model
{
    protected $guarded =[];

    public function product_album()
    {
        return $this->belongsTo(ProductAlbum::class);
    }
}
