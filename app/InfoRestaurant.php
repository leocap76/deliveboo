<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoRestaurant extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'address',
        'description',
        'img_path',
        'opening_time',
        'closing_time'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
