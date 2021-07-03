<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenterStone extends Model
{
    protected $guarded = [];

    public function clarity()
    {
        return $this->hasOne(CenterStoneClarity::class);
    }

    public function size()
    {
        return $this->hasOne(CenterStoneSize::class);
    }

    public function color()
    {
        return $this->hasOne(CenterStoneColor::class);
    }
}
