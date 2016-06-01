<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    protected $fillable =  ['name', 'parent_category_id', 'description' ,'image_id'];

    public $rootCategoryName = "Root Category";

    /*
     * Get parent category
     */
    public function parent(){
        return $this->belongsTo('App\Category','parent_category_id','id');
    }

    /*
     * Get sub category
     */
    public function subCategories(){
        return $this->hasMany('App\Category','parent_category_id','id');
    }

    /*
     * Get parent category name, if there is no parent, return root category name
     * @return string
     */
    public function getParentCategoryNameAttribute(){
        $parent = $this->parent;
        return is_null($parent)?$this->rootCategoryName:$parent->name;
    }

    /*
     * Get products
     */
    public function products(){
        return $this->hasMany('App\Product');
    }

    public function image(){
        return $this->hasOne('App\Resource','id','image_id');
    }
    public function getImageUrlAttribute(){

        return !is_null($this->image)? '/storage/'.$this->image->path:"http://placehold.it/150x150.png";
    }

}
