<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function areas()
    {
        return $this->hasMany('App\Area');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function products()
    {
        return $this->hasMany('App\Products');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Companies');
    }

    public function customers()
    {
        return $this->belongsToMany('App\Customer');
    }
    public function enterprise()
    {
       return $this->hasOne('App\Enterprise');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

}
