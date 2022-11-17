<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        'name',
        'img',
        'description',
        'price',
        'visible',
        'slug'
    ];
}
