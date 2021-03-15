<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "slug",
        "description",
        "ingredients",
        "price",
        "img_path",
        "vegan",
        "vegetarian",
        "spicy",
        "glutenfree",
        "available"
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }
}
