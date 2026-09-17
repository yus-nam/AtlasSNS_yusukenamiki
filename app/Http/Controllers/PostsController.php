<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


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

    //投稿機能
    public function store(Request $request)
    {
        // 入力値のチェック（バリデーション）
        $validated = $request->validate([
            'post' => 'required|max:150',
        ]);

        // データベースへ保存
        Post::create($validated);

        // 保存後、一覧画面などにリダイレクト
        return redirect('/posts')->with('success', '投稿が完了しました');
    }
    
}
