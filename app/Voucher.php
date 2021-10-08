<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'starting_date',
        'ending_date',
    ];

    public function getStatusDecoratedAttribute()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
}
