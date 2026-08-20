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


        // \Log::info('UsersController@search called');

        return view('users.search');
        // dd(view('users.search')->getPath());
        // dd(file_get_contents(resource_path('views/users/search.blade.php')));


    
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
