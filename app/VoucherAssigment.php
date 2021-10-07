<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherAssigment extends Model
{
    protected $guarded = [];

    protected $with = 'voucher';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
