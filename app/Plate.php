<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plate extends Model
{
    protected $fillable = [
        'name',
        'img',
        'description',
        'price',
        'is_visible',
        'slug',
        'restaurant_id',
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public static function getUniqueSlugFromTitle($name)
    {
        $slug_base = Str::slug($name);
        $slug = $slug_base;
        // controllare che sia unico
        $plate_exist = Plate::where('slug', $slug)->first();
        $count = 1;
        while ($plate_exist) {
            $slug = $slug_base . '-' . $count;
            $plate_exist = Plate::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }

    public function getImagePathAttribute()
    {
        if (filter_var($this->img, FILTER_VALIDATE_URL))
            return $this->img;
        return $this->img ? asset('images/' . $this->img) : null;
    }
}
