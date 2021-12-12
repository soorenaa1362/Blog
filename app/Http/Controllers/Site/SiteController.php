<?php

namespace App\Http\Controllers\Site;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FrontModels\Category;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('site.index', compact('categories', 'articles'));
    }


}
