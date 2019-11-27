<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [

        'category_id',
        'user_id',
        'area_id',
        'Store_Name',
        'Owner_Name',
        'C_License_no',
        'Email',
        'Address',
        'Contact',


    ];


    public function category()
    {
        return $this->belongsTo('App\category');
    }
    public function area()
    {
        return $this->belongsTo('App\Area');
    }
    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
