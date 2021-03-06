<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ProductVariant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  [
            'cartCount'     =>Cart::count(),
            'cartItems' => Cart::content()
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variantId = $request->get('variant_id');
        $variant = ProductVariant::find($variantId);
        Cart::add([
            'id' => $variant->id,
            'name' => $variant->name,
            'qty' => 1,
            'price' => $variant->price
        ]);

        $result = [
            'cartCount'     =>Cart::count(),
            'cartItems' => Cart::content()
        ];

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function show($rowId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function edit($rowId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        Cart::update($rowId,$request->get('qty'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
    }
}
