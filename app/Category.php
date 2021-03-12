<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        "category_name",
        "category_color",
        "category_description",
        "category_img_path"
    ];

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('App\User');
    }

}
