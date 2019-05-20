<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [

        'name',
        'user_id',
        'role_id',
        'contact',
        'email',
        'CNIC',
        'adress',
        'gender',
        'qualification',
        'Salary',
        'DOB',
        'photo_id',
        'password',

    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

}
