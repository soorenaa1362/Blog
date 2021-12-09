<?php

namespace App\Http\Controllers\Author;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('author.articles.index', compact('articles'));
    }
}
