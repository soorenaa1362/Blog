<?php

namespace App\Http\Controllers\Author;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    public function index()
    {
        $user = Auth::user();        
        $articles = Article::where('user_id', $user->id)->get();
        return view('author.articles.index', compact('articles'));
    }


    public function create()
    {
        $categories = Category::where('active', 1)->pluck('title', 'id');
        return view('author.articles.create', compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            // 'slug' => 'required|unique:articles|max:20',
            'categories' => 'required',
        ]);

        $article = new Article;
        if(empty($request->slug)){
            $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        }else{
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug); 
        }
        $request->merge(['slug' => $slug]);

        $article = $article->create($request->all());
        $article->Categories()->attach($request->categories);

        $msg = "مطلب جدید با موفقیت ایجاد شد.";
        return redirect(route('author.articles.index'))->with('success', $msg); 
    }



    public function edit(Article $article)
    {
        $article = Article::find($article->id);
        $categories = Category::where('active', 1)->pluck('title', 'id');
        return view('author.articles.edit', compact('article', 'categories'));
    }


    public function update(Article $article, Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            // 'slug' => 'required|max:20',
        ]);

        $article->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => 0,
        ]);

        $article->Categories()->sync($request->categories);

        $msg = "مطلب مورد نظر با موفقیت ویرایش شد.";
        return redirect(route('author.articles.index'))->with('success', $msg);     
    }



    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        $msg = "مطلب مورد نظر با موفقیت حذف شد.";
        return redirect(route('author.articles.index'))->with('warning', $msg);
    }


}
