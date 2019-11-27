<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    //
    protected $fillable = [

        'employee_id',
        'customer_id',
        'city',
        'phone'

    ];
}
