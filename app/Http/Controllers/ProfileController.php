<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

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

    public function show($id)
    {
        //相手ユーザを取得
        $user = User::findOrFail($id);

        //相手のフォロー・フォロワーを取得
        $followings = $user->followings;
        
        $followers = $user->followers;

        // ログインユーザーが相手をフォローしているか確認
        $isFollowing = Auth::user()->followings()->where('users.id', $user->id)->exists();

        return view('profiles.show', compact('user','followings','followers', 'isFollowing'));

    }



}
