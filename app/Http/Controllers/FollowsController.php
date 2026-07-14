<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class FollowsController extends Controller
{
    public function followList() {
        $user = Auth::user();

        // ユーザーがフォローしている数
        $followingCount = $user->following()->count(); 
        // ユーザーのフォロワー数
        $followerCount = $user->followers()->count();

        // フォローリストビューファイルへデータを送信
        return view('follows.followList', compact('followingCount', 'followerCount'));
    }


    // public function followerList() {
    //    $user = Auth::user();
    //    $followers = $user->followers; // フォロワーリストを取得
    //    return view('follows.followerList', compact('followers'));
    // }

    public function followerList() {
        return view('follows.followerList');
    }





}
