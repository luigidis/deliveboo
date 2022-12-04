<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderPlate extends Pivot
{
    protected $fillable = [
        'order_id',
        'plate_id',
        'quantity',
    ];
        
}
