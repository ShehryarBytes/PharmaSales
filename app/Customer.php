<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //


    public function catagory()
    {
        return $this->hasOne('App/customer_catagory');
    }
}
