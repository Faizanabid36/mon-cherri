<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenterStoneClarity extends Model
{
    protected $guarded = [];

    public function stone()
    {
        return $this->belongsTo(CenterStone::class);
    }
}
