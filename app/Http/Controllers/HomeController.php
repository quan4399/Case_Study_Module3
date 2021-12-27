<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $menProducts = Product::where('featured',true)->where('product_category_id',1)->get();
        $womenProducts = Product::where('featured',true)->where('product_category_id',2)->get();
        $user = User::all();
        $blogs =Blog::orderBy('id','desc')->limit(3)->get();

        return view('frontend.home',compact('menProducts','womenProducts','blogs','user'));
    }
}
