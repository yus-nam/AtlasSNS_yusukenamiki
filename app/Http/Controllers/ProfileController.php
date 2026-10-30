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
            'username' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8|confirmed',
            'bio' => 'nullable|max:1000',
            'icon_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        // ログイン中のユーザーを取得
        $user = Auth::user();

        // ユーザー名・メールアドレス・自己紹介を更新

        if ($request->filled('username')) {
            $user->username = $request->username;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        // パスワードが入力された場合だけ更新
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->bio = $request->input('bio');

        // 画像が選択された場合だけ保存
        if ($request->hasFile('icon_image')) {
            $path = $request->file('icon_image')->store('icons', 'public');
            $user->icon_image = $path;
        }
        
        // データベースに保存
        $user->save();

        return redirect('/profile/' . Auth::id())->with('success', 'プロフィールを更新しました');
    }






    public function show($id)
    {
        //相手ユーザを取得
        $user = User::findOrFail($id);

        //相手のフォロー・フォロワーを取得
        $followings = $user->followings;
        
        $followers = $user->followers;

        //そのユーザーの投稿を取得
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        // dd($posts);

        // ログインユーザーが相手をフォローしているか確認
        $isFollowing = Auth::user()->followings()->where('users.id', $user->id)->exists();

        return view('profiles.show', compact('user','followings','followers', 'isFollowing', 'posts'));

    }



}
