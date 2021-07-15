<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStone extends Model
{
    protected $guarded = [];

    protected $with = ['p_color_from', 'p_color_to', 'p_size_from', 'p_size_to', 'p_clarity_from', 'p_clarity_to'];

    public function p_color_from()
    {
        return $this->belongsTo(CenterStoneColor::class, 'color_from');
    }

    public function p_color_to()
    {
        return $this->belongsTo(CenterStoneColor::class, 'color_to');
    }

    public function p_size_from()
    {
        return $this->belongsTo(CenterStoneSize::class, 'size_from');
    }

    public function p_size_to()
    {
        return $this->belongsTo(CenterStoneSize::class, 'size_to');
    }

    public function p_clarity_from()
    {
        return $this->belongsTo(CenterStoneClarity::class, 'clarity_from');
    }

    public function p_clarity_to()
    {
        return $this->belongsTo(CenterStoneClarity::class, 'clarity_to');
    }
}
