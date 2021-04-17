<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    // use SoftDeletes;
    
	protected $fillable = [
    	'state_name', 'country_id',
    ];
    public function cities()
    {
    	return $this->hasMany('App\City');
    }
    public function users()
    {
    	return $this->hasMany('App\UserInfo');
    }
    public function country()
    {
       return $this->belongsTo('App\Country');
    }
}
