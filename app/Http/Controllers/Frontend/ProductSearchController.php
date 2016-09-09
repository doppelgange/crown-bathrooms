<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function index(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name','like','%'.$query.'%')
            ->paginate(16);
        return view('frontend.product.index',compact(['products']));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
}
