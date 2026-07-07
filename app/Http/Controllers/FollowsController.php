<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class FollowsController extends Controller
{
    //
    // public function followList() {
       
    //     $user = Auth::user();

    //     $followingCount = $user->followings()->count();
    //     $followerCount = $user->followers()->count();

    //     return view('login', compact('followingCount', 'followerCount'));
    // }


    public function followList() {
       $user = Auth::user();
       $followingCount = $user->following()->count();
       $followerCount = $user->followers()->count();
       return view('follows.followList', compact('followingCount', 'followerCount'));
   }

    // public function followerList(){
    //     return view('follows.followerList');
    // }

    public function followerList() {
       $user = Auth::user();
       $followers = $user->followers; // フォロワーリストを取得
       return view('follows.followerList', compact('followers'));
    }






}
