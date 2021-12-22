<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('active', 1)->get();
        return view('author.categories.index', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'slug' => 'required|max:20',
        ]); 

        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->active = $request->active;
        $category->save();

        $msg = "دسته بندی جدید با موفقیت ایجاد شد.";
        return redirect(route('author.categories.index'))->with('success', $msg);
    }



    public function edit(Category $category)
    {
        return view('author.categories.edit', compact('category'));
    }




}
