<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;


class FollowsController extends Controller
{
    public function followList() {
        $user = Auth::user();

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

        //フォロワーのID一覧を取得
        $followerIds = $followers->pluck('follower_id')->toArray();
        
        // フォロワーリストビューファイルへデータを送信
        return view('follows.followerList', compact('followingCount', 'followerCount', 'followers', 'followerIds'));
    }

    // --------------ここから追記pt2-------------------

    // フォローするメソッド
    public function follow($id)
    {
        $userToFollow = User::findOrFail($id);
        $user = Auth::user();

        // 既にフォローしているか確認
        if (!$user->followings()->where('following_id', $userToFollow->id)->exists()) {
            $user->followings()->attach($userToFollow);
            return redirect()->back()->with('message', 'フォローしました');
        } else {
            return redirect()->back()->with('message', 'すでにフォローしています');
        }
    }

    // フォロー解除するメソッド
    public function unfollow($id)
    {
        $userToUnfollow = User::findOrFail($id);
        $user = Auth::user();

        // フォローしているか確認
        if ($user->followings()->where('following_id', $userToUnfollow->id)->exists()) {
            $user->followings()->detach($userToUnfollow);
            return redirect()->back()->with('message', 'フォローを解除しました');
        } else {
            return redirect()->back()->with('message', 'フォローしていません');
        }
    }





}
