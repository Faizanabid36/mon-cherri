<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenterStoneColor extends Model
{
    protected $guarded = [];

    public function stone()
    {
        return $this->belongsTo(CenterStone::class);
    }
    public function products()
    {
        return $this->hasMany(ProductStone::class,'color_id');
    }
}
