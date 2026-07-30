<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;


class FollowsController extends Controller
{
    public function followList() {
        $user = Auth::user();

        if ($user === null) {
        // ログインページにリダイレクトするか、エラーメッセージを表示する
            return redirect()->route('login')->with('error', 'ログインが必要です。');
        }


        // ユーザーがフォローしている数
        $followingCount = $user->followings()->count(); 
        // ユーザーのフォロワー数
        $followerCount = $user->followers()->count();

        $following = $user->followings()->get();

        $followingIds = $following->pluck('id')->toArray();

        // フォローリストビューファイルへデータを送信
        return view('follows.followList', compact('followingCount', 'followerCount', 'following', 'followingIds'));
    }


    public function followerList() {
        $user = Auth::user();

        // ユーザーがフォローしている数
        $followingCount = $user->followings()->count(); 
        // ユーザーのフォロワー数
        $followerCount = $user->followers()->count();

        $followers = $user->followers()->get();


        return view('follows.followerList', compact('followingCount', 'followerCount', 'followers'));
    }





}
