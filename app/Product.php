<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function allImages(){
        $product_images = DB::table('products as p')
            ->join('product_resources as pr','p.id','=','pr.product_id')
            ->join('resources as r','r.id','=','pr.resource_id')
            ->where('p.id',$this->id)
            ->where('pr.resource_type','image')
            ->select([
                'p.id as product_id', DB::raw("'' as variant_id") ,'r.*'
            ])
            ->get();
        $variant_images = DB::table('products as p')
            ->join('product_variants as pv','p.id','=','pv.product_id')
            ->join('product_variant_images as pvi','pv.id','=','pvi.product_variant_id')
            ->join('resources as r','r.id','=','pvi.resource_id')
            ->where('p.id',$this->id)
            ->select([
                'p.id as product_id', 'pv.id as variant_id' ,'r.*'
            ])
            ->get();
        return array_merge($product_images,$variant_images);
    }



    public function getFeatureImageAttribute(){
        return empty($this->allImages()) ? (object)['path'=>'http://placehold.it/500x500.png'] : $this->allImages()[0];
    }

    public function attachments(){
        return $this->belongsToMany('App\Resource','product_resources')->wherePivot('resource_type', 'attachment');
    }

}
