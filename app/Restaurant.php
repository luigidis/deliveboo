<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function user() {
        return $this->hasOne('App\User');
    }

    public function categories() {
        return $this->belongsToMany('App\Category');
    }
}
