<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function images(){
        return $this->belongsToMany('App\Resource','product_variant_images');
    }

    public function uploadImages(Request $request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = 'products/'.$file->getClientOriginalName();
            if(!Storage::has($path)){
                if(Storage::put($path,file_get_contents($file ->getRealPath()))){
                    return Resource::create([
                        'name'=>$file->getClientOriginalName(),
                        'path'=>$path,
                        'mime_type'=>$file->getMimeType()
                    ]);
                }
            }
        }
    }
}
