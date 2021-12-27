<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frontend.shop.cart',compact('carts','total','subtotal'));
    }


    public function add($id)
    {
        $product =Product::findOrFail($id);

        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->discount ?? $product -> price,
            'weight'=>$product->weight ?? 0,
            'option'=>[
                'images'=>$product->productImages,
            ]
        ]);

        return back();
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return back();
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
