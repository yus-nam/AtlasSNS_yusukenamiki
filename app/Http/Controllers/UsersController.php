<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;



class UsersController extends Controller
{
    //
    public function login(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');
        // return view('post.index');
    }

    public function index(Request $request) {
        //ユーザ一覧を取得
        $users = User::all();

        return view('posts.index', compact('users'));

    }


    //検索ページの表示
    public function showUserList()
    {
        $currentUserId = Auth::id(); // 現在のログインユーザーのIDを取得

        // 現在のログインユーザーを除外したユーザーリストを取得
        $users = User::where('id', '!=', $currentUserId)->get();

        return view('users.search', compact('users')); // ビューにデータを渡す
    }



    //検索機能の実装
    public function search(Request $request)
    {
        $username = $request->input('username');

        // $users = User::query();

        $users = User::where('id', '!=', auth()->id()); //全リストを取得

        if ($request->filled('username')) {
            
            $users->where('username', 'like', '%' . $username . '%'); //検索条件の指定
        }

        $users = $users->get();

        // 指定するビューを 'users.search' (resources/views/users/search.blade.php) に変更
        return view('users.search', compact('users', 'username'));
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
