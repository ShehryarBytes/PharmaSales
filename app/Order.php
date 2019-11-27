<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = [

        'customer_id',
        'employee_id',
        'delivered',
        'total_amount',

    ];


    public function orders_product()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('qty');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }


    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
