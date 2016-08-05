<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =  ['id','files'];
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
        return $this->belongsToMany('App\Resource','product_resources')->withTimestamps();
    }

    public function images(){
        return $this->belongsToMany('App\Resource','product_resources')->wherePivot('resource_type', 'image');
    }

    public function feature_image(){
        return $this->images()->first();
    }

    public function attachments(){
        return $this->belongsToMany('App\Resource','product_resources')->wherePivot('resource_type', 'attachment');
    }

}
