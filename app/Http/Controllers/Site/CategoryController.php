<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FrontModels\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $categories = Category::all();
        $articles = DB::table('article_category')->where('category_id', $category->id)
            ->where('status', 1)
            ->join('articles', 'articles.id', 'article_category.article_id')
            ->get();
        return view('site.categories.show', compact('categories', 'articles'));

    }
}
