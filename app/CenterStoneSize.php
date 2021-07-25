<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductStone;
class CenterStoneSize extends Model
{
    protected $guarded = [];

    public function stone()
    {
        return $this->belongsTo(CenterStone::class);
    }
    public function products()
    {
        return $this->hasMany(ProductStone::class,'size_id');
    }
}
