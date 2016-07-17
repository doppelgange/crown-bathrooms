<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontendProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {

        if(is_null($category->id)){
            $products = Product::paginate();
        }else{
            $products = Product::whereIn('category_id',$category->getSubCategoryRecursively())
                ->paginate();
        }
        return view('frontend.product.index',compact(['products','category']));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Category $category,Product $product)
    {
        $variants = $product->variants()->pluck('name','id')->all();
        return view('frontend.product.show')->with(compact('product','category','variants'));
    }

}
