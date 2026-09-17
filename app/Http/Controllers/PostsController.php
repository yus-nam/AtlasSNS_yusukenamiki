<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{
    
    //
    public function index(){
        $posts = Post::all(); // 全ての投稿を取得
        return view('posts.index', compact('posts')); // ビューに渡す
    }




    public function postCounts() {
      $posts = Post::get();
      return view('yyyy', compact('posts'));
    }



    //投稿機能
    public function store(Request $request)
    {
        // 入力値のチェック（バリデーション）
        $validated = $request->validate([
            'post' => 'required|max:150',
        ]);

        //ユーザIDを追加
        $validated['user_id'] = auth()->id();

        // データベースへ保存
        Post::create($validated);

        // 保存後、一覧画面などにリダイレクト
        return redirect('/posts')->with('success', '投稿が完了しました');
    }
    
}
