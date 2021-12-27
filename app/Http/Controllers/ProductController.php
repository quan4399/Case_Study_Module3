<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $images = ProductImage::all();
        return view('admin.products.list',compact('products','images'));
    }

    public function create()
    {
        $categories =ProductCategory::all();
        $brands = Brand::all();
        return view('admin.products.create',compact('categories','brands'));


    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->brand_id = $request->brand;
        $product->product_category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->tag = $request->tag;
        $product->featured = $request->featured;
        $product->description = $request->description;


//        if ($request->hasFile('image')) {
//            $path = $request->file('image')->store('images', 'public');
//            $product->image = $path;
//        }
        $product->save();

        return redirect()->route('products.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.products.edit',compact('product','categories','brands'));
    }

    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->brand_id = $request->brand;
        $product->product_category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->tag = $request->tag;
        $product->featured = $request->featured;
        $product->description = $request->description;

        $product->save();
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
