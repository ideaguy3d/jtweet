<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Posts;

class PostsCtrl extends Controller
{
    //
    public function show($slug) {
        $post = Posts::where('slug', $slug)->firstOrFail();
        //dd($post);
        
        return view('posts', ['post' => $post->body]);
    }
}
