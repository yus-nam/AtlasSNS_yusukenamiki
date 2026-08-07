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

    // 2. データを保存する
    public function store(Request $request)
    {
        // 入力値のチェック（バリデーション）
        $validated = $request->validate([
            
            'body' => 'required|max:150',
        ]);

        // データベースへ保存
        Post::create($validated);

        // 保存後、一覧画面などにリダイレクト
        return redirect('/posts')->with('success', '投稿が完了しました');
    }







    
}
