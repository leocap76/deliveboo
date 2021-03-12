<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        "plate_name",
        "plate_description",
        "plate_ingredients",
        "plate_price",
        "plate_vegan",
        "plate_vegetarian",
        "plate_spicy",
        "plate_glutenfree",
        "plate_available"
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
