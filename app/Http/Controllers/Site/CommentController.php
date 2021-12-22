<?php

namespace App\Http\Controllers\Site;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->text = $request->text;
        $comment->article_id = $article->id;
        $comment->save();
        
        return redirect(route('site.articles.show'));
    }
}
