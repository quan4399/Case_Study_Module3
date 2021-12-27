<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.categories.list',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $category = new ProductCategory();
        $category->name = $request->name;
        $category->quantity = $request->quantity;
        $category->save();
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->name = $request->name;
        $category->quantity = $request->quantity;
        $category->save();
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->products()->delete();
        $category->delete();
        return redirect()->route('categories.index');
    }
}
