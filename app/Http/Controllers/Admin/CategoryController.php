<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'slug' => 'required',
            'active' => 'required',
        ]);

        $category = new Category([
            'title' => $request->title, 
            'slug' => $request->slug, 
            'active' => $request->active,
        ]);

        $category->save();
        $msg = "دسته بندی جدید با موفقیت ایجاد شد.";
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
            'slug' => 'required',
        ]);

        $category->update([
            'title' => $request->title,            
            'slug' => $request->slug, 
            'active' => $request->active, 
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
