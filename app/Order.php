<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'price',
        'arrPlates',
        'comment',
        'time',
        'address',
        'name',
        'email'

    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
