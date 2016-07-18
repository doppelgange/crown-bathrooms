<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductVariantRequest;
use App\Http\Requests;
use App\Product;
use App\ProductVariant;
use Laracasts\Flash\Flash;

class ProductVariantController extends Controller
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
     * @param Product $product
     * @param ProductVariant $variant
     * @return Response
     * @internal param Product $product
     */
    public function index(Product $product,ProductVariant $variant)
    {
        $variants = $variant->paginate();
        return view('backend.product-variant.index', compact('product','variants'));
    }

    public function create(Product $product){
        $view = 'create';
        return view('backend.product-variant.create',compact('product','view'));
    }

    /**
     * Store a newly created product in storage
     *
     * @param Product $product
     * @param ProductVariantRequest $request
     * @return Response
     */
    public function store(Product $product,ProductVariantRequest $request)
    {
        //Create product
        $variant = ProductVariant::create(['product_id'=>$product->id]+$request->all());

        $variant->id ? Flash::success('Product variant is created successfully.') : Flash::error('Failed to create product variant.');

        return redirect()->route('backend.product.{product}.variant.index',$product->id,$variant->id);
    }

    /**
     * Display the specified product.
     *
     * @param Product $product
     * @param ProductVariant $variant
     * @return Response
     * @internal param ProductVariant $variant
     */
    public function show(Product $product,ProductVariant $variant)
    {
        return view("backend.product-variant.show",compact('product','variant'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param Product $product
     * @param ProductVariant $variant
     * @return Response
     */
    public function edit(Product $product,ProductVariant $variant)
    {
        $view = 'edit';
        return view('backend.product-variant.edit',compact('product','variant','view'));
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
