<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    // public function profile(){
    //     return view('profiles.profile');
    // }

    // 自分のフォローフォロワーを表示するページのコード
    public function profile()
    {
        $user = Auth::user(); // ログインしているユーザーを取得

        $followings = $user->followings; // フォローしているユーザーのコレクションを取得
        
        $followers = $user->followers; // 自分をフォローしているユーザーのコレクションを取得

        return view('profiles.profile', compact('user', 'followings', 'followers')); // プロフィールビューにデータを渡す
    }

  
    public function edit() {

        $user = Auth::user();

        return view('profiles.edit', compact('user'));

    }


    public function update(Request $request) {
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8|confirmed',
            'introduction' => 'nullable|max:1000',
        ]);

        // ログイン中のユーザーを取得
        $user = Auth::user();

        // ユーザー名・メールアドレス・自己紹介を更新
        $user->username = $request->username;
        $user->email = $request->email;
        $user->introduction = $request->introduction;

        // パスワードが入力された場合だけ更新
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // データベースに保存
        $user->save();

        return redirect('/profile')->with('success', 'プロフィールを更新しました');
    }












    public function show($id)
    {
        //相手ユーザを取得
        $user = User::findOrFail($id);

        //相手のフォロー・フォロワーを取得
        $followings = $user->followings;
        
        $followers = $user->followers;

        //そのユーザーの投稿を取得
        $posts = Post::where('user_id', $user->id)->get();
        // dd($posts);

        // ログインユーザーが相手をフォローしているか確認
        $isFollowing = Auth::user()->followings()->where('users.id', $user->id)->exists();

        return view('profiles.show', compact('user','followings','followers', 'isFollowing', 'posts'));

    }



}
