<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	// use SoftDeletes;
	
    protected $fillable = ['user_id', 'body', 'commentable_id', 'commentable_type', 'status'];

    public function commentable()
    {
        return $this->morphTo();
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
