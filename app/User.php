<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable
{
    // use SoftDeletes;

    use Notifiable;
    use HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'facebook_id', 'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function info()
    {
        return $this->hasOne('App\UserInfo');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    public function orders()
    {
        return $this->hasManyThrough('App\Order', 'App\Invoice');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function wishlist()
    {
        return $this->belongsToMany('App\Product', 'user_wishes')->withTimestamps();
    }

    public function vouchers()
    {
        return $this->hasMany(VoucherAssigment::class);
    }
}
