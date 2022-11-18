<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'address',
        'p_iva',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function plates()
    {
        return $this->hasMany('App\Plate');
    }
}
