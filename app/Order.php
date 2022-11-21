<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plates() {
        return $this->belongsToMany('App\Plate');


    }
    
    protected $fillable = [
        'status',
        'total',
        'name_client',
        'surname_client',
        'address_client',
        'phone_client',
        'email_client',
    ];
}
