<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    //
    public function show($articleId) {
        $article = Article::find($articleId);
        return view('articles.show', ['article' => $article]);
    }
}
