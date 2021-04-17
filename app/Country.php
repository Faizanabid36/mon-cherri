<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
	// use SoftDeletes;
	
    protected $fillable = [
    	'country_name',
    ];
    public function states()
    {
    	return $this->hasMany('App\State');
    }
    public function users()
    {
    	return $this->hasMany('App\UserInfo');
    }
}
