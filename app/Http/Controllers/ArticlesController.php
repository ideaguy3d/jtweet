<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function show(Article $article) {
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
        Article::create(request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]));
        
        return redirect('/articles');
    }
    
    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }
    
    public function update(Article $article) {
        Article::create(request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]));
        
        return redirect('/articles/' . $article->id);
    }
}
