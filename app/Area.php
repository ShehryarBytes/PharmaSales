<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $fillable = [

        'user_id',
        'name',
        'code',
        'no_of_stores',

    ];

}
