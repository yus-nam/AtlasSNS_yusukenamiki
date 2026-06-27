<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class FollowsController extends Controller
{
    //
    public function followList() {
        // return view('follows.followList');
        public function index() {
            
        $user = Auth::user();

        $followingCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        return view('login', compact('followingCount', 'followerCount'));
    }











    public function followerList(){
        return view('follows.followerList');
    }








}
