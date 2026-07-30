<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function login(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');
        // return view('post.index');
    }

    public function search(){
        return view('users.search');
    }

// --------------ここから追記-------------------

    public function showProfile($id) {
      $currentUserId = auth()->id(); // 現在ログインしているユーザーのID
      $targetUserId = $id; // フォローしたいユーザーのID

    // フォロー状態の確認
      $followed = DB::table('follows')
        ->where('follower_id', $currentUserId)
        ->where('followed_id', $targetUserId)
        ->exists();

    // プロフィールをビューに渡す
      return view('profile', compact('followed', 'targetUserId'));

}










}
