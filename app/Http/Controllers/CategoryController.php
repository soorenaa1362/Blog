<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();        
        return view('admin.categories.index', compact('categories'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:categories|max:20',
            'description' => 'required',
        ]);

        $category = new Category([
            'title' => $request->title, 
            'description' => $request->description, 
            'active' => $request->active,
        ]);

        $category->save();
        $msg = "ذخیره دسته بندی جدید با موفقیت انجام شد.";
        return redirect()->route('admin.categories.index')->with('success', $msg);
    }

    
    public function show(Category $category)
    {
        $category = Category::find($category->id);
        return view('admin.categories.show', compact('category'));
    }
    
    
    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        return view('admin.categories.edit', compact('category'));
    }

    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required',
        ]);

        $category->update([
            'title' => $request->title,
            'active' => $request->active, 
            'description' => $request->description, 
        ]);
        $msg = "ویرایش با موفقیت انجام شد.";
        return redirect(route('admin.categories.index'))->with('success', $msg);

    }

    
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        $msg = "دسته بندی مورد نظر با موفقیت حذف شد.";
        return redirect(route('admin.categories.index'))->with('warning', $msg);
    }
}

