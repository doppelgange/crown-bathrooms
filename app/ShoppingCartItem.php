<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    protected $guarded = ['id'];

    public function cart(){
        return $this->belongsTo('App\ShoppingCart');
    }
}
