<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductVariantRequest;
use App\Http\Requests;
use App\Product;
use App\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Laracasts\Flash\Flash;

class VariantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the product variant.
     *
     * @param Request $request
     * @return Response
     * @internal param Product $product
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $variants = ProductVariant::where('name','like','%'.$name.'%')
            ->where('code','like','%'.$code.'%')
            ->paginate();
        return view('backend.variant.index', compact('variants'));
    }

    /**
     * Display the specified product.
     *
     * @param ProductVariant $variant
     * @return Response
     * @internal param ProductVariant $variant
     */
    public function show(ProductVariant $variant)
    {
        return App::make('App\Http\Controllers\Backend\ProductVariantController')->show($variant->product,$variant);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param ProductVariant $variant
     * @return Response
     */
    public function edit(ProductVariant $variant)
    {
        return App::make('App\Http\Controllers\Backend\ProductVariantController')->edit($variant->product,$variant);
//        $view = 'edit';
//        return view('backend.variant.edit',compact('variant','view'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param Product $product
     * @param ProductVariant $variant
     * @param ProductVariantRequest $request
     * @return Response
     */
    public function update(Product $product,ProductVariant $variant, ProductVariantRequest $request)
    {
        //Create product
        $variant->fill($request->all());
        $variant->save();

        //remove all images
        $variant->images()->detach();
        //associate with images
        $variant->images()->attach($request->images);

        return redirect()->back();
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  Product $product
     * @param ProductVariant $variant
     * @return Response
     * @throws \Exception
     */
    public function destroy(Product $product,ProductVariant $variant)
    {
        $variant->delete() ?
            Flash::success('backend.delete.success') :
            Flash::error('backend.delete.fail');
        return redirect()->route('backend.product.{product}.variant.index',$product->id);
    }
}
