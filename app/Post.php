<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Post extends Model implements Viewable
{
    // use SoftDeletes;
    use InteractsWithViews;
    
    protected $fillable = [
    	'user_id','title','slug','content'
    ];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function image()
    {
        return $this->morphOne('App\Image','imageable');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }
}
