<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    // use SoftDeletes;
    
    protected $fillable = [
    'invoice_no', 'payment_method', 'sub_total', 'grand_total', 'due_date', 'status', 'customer_note'
    ];

    protected $dates = ['due_date'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function orders()
    {
    	return $this->hasMany('App\Order');
    }

}
