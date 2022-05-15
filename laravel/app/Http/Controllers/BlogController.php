<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Article;
use myProject\View\View;


class BlogController extends Controller
{
    public function blogPage()
    {
        $articles = Article::all();

        return view('project', [
            "articles" => $articles
        ]);
    }

    public function articlePage($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return abort(404);
       }

        $comments = Comment::where('article_id', $id)->get();

        return view('article', [
            "article" => $article,
            "comments" => $comments
        ]);
    }

    public function updatePage($id)
    {
        $article = Article::find($id);

        return view('update', [
            "article" => $article
        ]);
    }
}

