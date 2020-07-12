<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function() {
    return view('welcome');
});

Route::get('/hello', function() {
    return view('hello', ['name' => request('name')]);
});

Route::get('/posts/{slug}', 'PostsCtrl@show');

Route::get('/contact', function() {
    return view('contact-us');
});

Route::get('/about', function() {
    //$articles = App\Article::latest()->get();
    $articles = App\Article::take(3)->latest()->get();
    //$articles = App\Article::paginate(2);
    
    //return ($articles); // just to get quick output
    return view('about', ['articles' => $articles]);
});


Route::get('/articles', 'ArticlesController@index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
// wildcards go after
Route::get('/articles/{article}', 'ArticlesController@show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');