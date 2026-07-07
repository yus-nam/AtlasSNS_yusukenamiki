<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // public function profile(){
    //     return view('profiles.profile');
    // }

    public function profile()
    {
        $user = Auth::user(); // ログインしているユーザーを取得

        $followings = $user->followings; // フォローしているユーザーのコレクションを取得
        
        $followers = $user->followers; // 自分をフォローしているユーザーのコレクションを取得

        return view('profile.profile', compact('user', 'followings', 'followers')); // プロフィールビューにデータを渡す
    }
  




}
