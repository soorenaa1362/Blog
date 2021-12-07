<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('admin.articles.index', compact('articles'));
    }


    public function create()
    {
        return view('admin.articles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|max:50',
        ]);

        $article = new Article([
            'title' => $request->title,
            'text' => $request->text,
            'active' => $request->active,
        ]);
        $article->save();
        
        $msg = "مطلب جدید با موفقیت ایجاد شد.";
        return redirect(route('admin.articles.index'))->with('success', $msg);        
    }


    public function edit(Article $article)
    {
        $article = Article::find($article->id);
        return view('admin.articles.edit', compact('article'));
    }


    public function update(Article $article, Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
        ]);

        $article->update([
            'title' => $request->title,
            'active' => $request->active,
            'text' => $request->text,
        ]);

        $msg = "مطلب با موفقیت ویرایش شد.";
        return redirect(route('admin.articles.index'))->with('success', $msg);
    }



    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        $msg = "مطلب مورد نظر با موفقیت حذف شد.";
        return redirect(route('admin.articles.index'))->with('warning', $msg);
    }



}
