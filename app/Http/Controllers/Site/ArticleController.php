<?php

namespace App\Http\Controllers\Site;

// use App\Models\Article;
use App\Models\FrontModels\Article;
use App\Http\Controllers\Controller;
use App\Models\FrontModels\Category;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $article->increment('hit'); 
        $categories = Category::where('active', 1)->get();
        return view('site.articles.show', compact('categories', 'article'));
    }
}
