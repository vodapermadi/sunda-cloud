<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index():View
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product.index',compact('products','categories'));
    }

    public function create():View
    {
        $categories = Category::all();

        return view('product.create',compact('categories'));
    }

    public function store(ProductRequest $request):RedirectResponse
    {
        Product::create($request->validated());
        return redirect()->route('admin.product');
    }

    public function edit($id):View
    {
        $data = Product::all()->findOrFail($id);
        $categories = Category::all();
        return view('product.edit',compact('data','categories'));
    }

    public function update(ProductRequest $request,$id): RedirectResponse
    {
        Product::all()->findOrFail($id)->update($request->validated());
        return redirect()->route('admin.product');
    }

    public function destroy($id):RedirectResponse
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('product.index');
    }
}
