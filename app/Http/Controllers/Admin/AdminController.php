<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $allUsers = User::all();
        $author = User::where('role', 2)->get();
        $users = User::where('role', 1)->get();

        $allArticles = Article::all();
        $articleStatus1 = Article::where('status', 1)->get();
        $articleStatus0 = Article::where('status', 0)->get();

        return view('admin.index', compact([
            'allUsers', 'author', 'users', 'allArticles', 'articleStatus1', 'articleStatus0']
        ));
    }
}
