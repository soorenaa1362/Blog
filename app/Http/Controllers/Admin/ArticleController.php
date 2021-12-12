<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('admin.articles.index', compact('articles'));
    }


    public function create()
    {
        // $categories = Category::all()->pluck('title', 'id');
        $categories = Category::where('active', 1)->pluck('title', 'id');
        return view('admin.articles.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            // 'slug' => 'required|unique:articles|max:20',
            'status' => 'required',
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
        return redirect(route('admin.articles.index'))->with('success', $msg);        
    }


    public function edit(Article $article)
    {
        $article = Article::find($article->id);
        $categories = Category::where('active', 1)->pluck('title', 'id');
        return view('admin.articles.edit', compact('article', 'categories'));
    }


    public function update(Article $article, Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            // 'slug' => 'required|max:20',
        ]);

        $article->update($request->all());
        $article->Categories()->sync($request->categories);

        $msg = "مطلب مورد نظر با موفقیت ویرایش شد.";
        return redirect(route('admin.articles.index'))->with('success', $msg);     
    }



    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        $msg = "مطلب مورد نظر با موفقیت حذف شد.";
        return redirect(route('admin.articles.index'))->with('warning', $msg);
    }



}
