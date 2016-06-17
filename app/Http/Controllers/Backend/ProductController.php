<?php

namespace App\Http\Controllers\Backend;

use App\Base\Controllers\BackendController;
use App\Http\Requests\ProductRequest;
use App\Http\Requests;
use App\Product;
use App\ProductVariant;
use Laracasts\Flash\Flash;

class ProductController extends BackendController
{
    /**
     * Display a listing of the product.
     *
     * @param Product $product
     * @return Response
     */
    public function index(Product $product)
    {
        $products = $product->paginate();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Store a newly created product in storage
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        //Create product
        $product = Product::create($request->only(['']));

        //Create master product variant

        $productVariant = ProductVariant::create([
            $request
        ]);

        ProductVariant::create();

        $resource = $this->saveImageFromRequest($request,$model);
        if(!is_null($resource)){
            $model->resources()->attach($resource->id, ['type' => 'image']);
        }

        $model->id ? Flash::success(trans('backend.create.success')) : Flash::error(trans('backend.create.fail'));
        return $this->redirectRoutePath('index');
        return $this->createFlashRedirect(Product::class, $request);
    }

    /**
     * Display the specified product.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        return $this->viewPath("show", $product);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        return $this->getForm($product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param Product $product
     * @param ProductRequest $request
     * @return Response
     */
    public function update(Product $product, ProductRequest $request)
    {
        $resource = $this->saveImageFromRequest($request,$product);
        if(!is_null($resource)){
            $product->resources()->attach($resource->id, ['type' => 'image']);
        }

        return $this->saveFlashRedirect($product, $request);
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  Product  $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        return $this->destroyFlashRedirect($product);
    }
}
