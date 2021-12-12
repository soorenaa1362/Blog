<?php

namespace App\Http\Controllers\Author;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $articles = Article::where('user_id', $user->id)->get();  
        return view('author.index', compact('articles', 'user'));
    }
}
