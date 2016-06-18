<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =  ['id'];
    /*
     * Get parent category
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }


    public function variants(){
        return $this->hasMany('App\ProductVariant');
    }

    public function resources(){
        return $this->belongsToMany('App\Resource','product_resource')->withTimestamps();
    }

    public function images(){
        return $this->belongsToMany('App\Resource','product_resource')->wherePivot('type', 'image');
    }

    public function attachments(){
        return $this->belongsToMany('App\Resource','product_resource')->wherePivot('type', 'attachment');
    }

}
