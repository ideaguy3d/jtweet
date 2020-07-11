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
    
    public function index() {
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }
    
    public function create() {
        return view('articles.create');
    }
    
    public function store() {
        // validation
        
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();
        //dd(request()->all());
        
        return redirect('/articles');
    }
    
    public function edit() {
        return view('articles.edit');
    }
}
