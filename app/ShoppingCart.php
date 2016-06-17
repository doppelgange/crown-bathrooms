<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $guarded = ['id'];

    public function items(){
        return $this->hasMany('App\ShoppingCartItem');
    }
}
