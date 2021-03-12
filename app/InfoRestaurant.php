<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoRestaurant extends Model
{
    protected $fillable = [
        'restaurant_name',
        'restaurant_slug',
        'address',
        'restaurant_description',
        'restaurant_img_path',
        'restaurant_opening_time',
        'restaurant_closing_time'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
