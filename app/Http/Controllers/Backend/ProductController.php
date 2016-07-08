<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests;
use App\Product;
use App\ProductVariant;
use Laracasts\Flash\Flash;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->categories = Category::whereNotExists(function ($query) {
                $query->select('*')
                    ->from('categories as parent')
                    ->whereRaw('categories.id = parent.parent_category_id');
            })
            ->pluck('name','id')->all();
    }

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

    public function create(){
        $categories = $this->categories;
        return view('backend.products.create',compact('categories'));
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
        $product = Product::create($request->only(['category_id','name','description']));

        //Create master product variant

        $productVariant = ProductVariant::create(array_merge(
            [
                'product_id'   =>  $product->id,
                'is_master'    =>   1
            ],
            $request->get('product_variants')
        ));
        if($productVariant->id){
            $productVariant->uploadImages($request);
        }
        $product->id ? Flash::success('Product and variant are created successfully.') : Flash::error('Failed to create product and variant.');

        return redirect(route('backend.product.show',$product->id));
    }

    /**
     * Display the specified product.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        return view("backend.products.show",compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = $this->categories;
        return view('backend.products.create',compact('product','categories'));
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
        //Create product
        $product = Product::update($request->only(['category_id','name','description']));

        return redirect(route('backend.product.show',$product->id));
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  Product  $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete() ?
            Flash::success('backend.delete.success') :
            Flash::error('backend.delete.fail');
        return redirect('backend.product.index');
    }
}
