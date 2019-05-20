<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = [
        'Product_Name',
        'user_id',
            'Cost',
            'Tax',
            'KG',
            'T_amount',
            'quantity',
            'batch',
            'Exp_Date',
            'Mfg_Date',
            'Bonus',
    ];



    public function customers()
    {
        return $this->belongsToMany('App\Customer');
    }



}
