<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'address',
        'p_iva',
        'user_id',
        'image',
        'slug'
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

    public static function getUniqueSlugFromTitle($name)
    {
        $slug_base = Str::slug($name);
        $slug = $slug_base;
        // controllare che sia unico
        $restaurant_exist = Restaurant::where('slug', $slug)->first();
        $count = 1;
        while ($restaurant_exist) {
            $slug = $slug_base . '-' . $count;
            $restaurant_exist = Restaurant::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }

    public function getImagePathAttribute()
    {
        if (filter_var($this->image, FILTER_VALIDATE_URL))
            return $this->image;
        return $this->image ? asset('images/' . $this->image) : '';
    }
}
