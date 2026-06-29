<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('post.index');
    }
    // public function postCounts() {
    //   $posts = Post::get();
    //   return view('yyyy', compact('posts'));
    // }



    
}
