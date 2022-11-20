<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderPlate extends Pivot
{
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
