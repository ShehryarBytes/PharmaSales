<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    //
    protected $fillable = [

        'name',
        'email',
        'license',
        'owner_name',
        'location',
        'disttrict',
        'phone',
        'mobile',
        'user_id',
        'photo_id',


    ];

    protected $table = 'enterprises';

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

}
