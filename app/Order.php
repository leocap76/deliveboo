<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'price',
        'arrPlates',
        'comment',
        'time',
        'address',
        'name',
        'email'

    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
