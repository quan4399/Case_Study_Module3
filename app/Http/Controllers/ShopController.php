<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('frontend.shop.index',compact('products'));
    }

    public function show($id){

        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('product_category_id',$product->product_category_id)
            ->where('tag',$product->tag)->limit(4)->get();
        return view('frontend.shop.show',compact('product','relatedProducts'));
    }

}
