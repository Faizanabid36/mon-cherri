<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStone extends Model
{
    protected $guarded = [];

//    protected $with = ['center_stone_size', 'center_stone_color', 'center_stone_clarity'];
    protected $with = ['p_color_from', 'p_color_to', 'p_clarity_from', 'p_clarity_to'];

    public function p_color_from()
    {
        return $this->belongsTo(CenterStoneColor::class, 'color_from');
    }

    public function p_color_to()
    {
        return $this->belongsTo(CenterStoneColor::class, 'color_to');
    }

//    public function p_size_from()
//    {
//        return $this->belongsTo(CenterStoneSize::class, 'size_from');
//    }
//
//    public function p_size_to()
//    {
//        return $this->belongsTo(CenterStoneSize::class, 'size_to');
//    }

    public function p_clarity_from()
    {
        return $this->belongsTo(CenterStoneClarity::class, 'clarity_from');
    }

    public function p_clarity_to()
    {
        return $this->belongsTo(CenterStoneClarity::class, 'clarity_to');
    }

//    public function center_stone_size()
//    {
//        return $this->belongsTo(CenterStoneSize::class,'size_id');
//    }
//    public function center_stone_color()
//    {
//        return $this->belongsTo(CenterStoneColor::class,'color_id');
//    }
//    public function center_stone_clarity()
//    {
//        return $this->belongsTo(CenterStoneClarity::class,'clarity_id');
//    }
}
