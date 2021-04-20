<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
	// use SoftDeletes;
	
   	protected $fillable = [
    	'city_name', 'state_id'
    ];
    public function state()
    {
    	return $this->belongsTo('App\State');
    }
    public function users()
    {
    	return $this->hasMany('App\UserInfo');
    }
}
