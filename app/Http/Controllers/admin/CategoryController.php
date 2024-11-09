<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index():View
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    public function create():View
    {
        return view('category.create');
    }

    public function edit($id):View
    {
        $category = Category::all()->findOrFail($id)->get();
        return view('category.edit',compact('category'));
    }

    public function store(CategoryRequest $request):RedirectResponse
    {
        Category::create($request->validated());
        return redirect()->route('admin.category');
    }

    public function update(CategoryRequest $request,$id):RedirectResponse
    {
        Category::all()->findOrFail($id)->update($request->validated());
        return redirect()->route('admin.category');
    }

    public function destroy():RedirectResponse
    {
        return redirect()->route('admin.category');
    }
}
