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
    public function parentCategory(){
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
        $parentCategory = $this->parentCategory;
        return is_null($parentCategory)?$this->rootCategoryName:$parentCategory->name;
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

    /**
     * This function is to return a list of sub category id recursively
     * @return array
     */
    public function getSubCategoryRecursively($type ='id'){
        $subCategoryList = [];
        switch($type){
            case 'id':
                $subCategoryList[] = $this->id;
                break;
            case 'array':
                $subCategoryList[] = $this->toArray();
                break;
            case 'object':
                $subCategoryList[] = $this;
                break;
        }
        $subCategories = $this->subCategories;
        if(count($subCategories)>0){
            foreach($subCategories as $subCategory){
                $subCategoryList = array_merge($subCategoryList,$subCategory->getSubCategoryRecursively($type));
            }

        }
        return $subCategoryList;
    }

    /**
     * @param string $type id, array, object
     * @return array
     */
    public function getParentCategoryRecursively($type ='id'){
        $parentCategoryList = [];
        switch($type){
            case 'id':
                $parentCategoryList[] = $this->id;
                break;
            case 'array':
                $parentCategoryList[] = $this->toArray();
                break;
            case 'object':
                $parentCategoryList[] = $this;
                break;
        }
        $parentCategory = $this->parentCategory;
        if(!is_null($parentCategory)){
            $parentCategoryList = array_merge($parentCategory->getParentCategoryRecursively($type),$parentCategoryList);

        }
        return $parentCategoryList;
    }

}
