<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('top', [PostsController::class, 'index']);

Route::get('profile', [ProfileController::class, 'profile']); /** プロフィール画面表示 */



//検索機能の実装
Route::get('/users', [UsersController::class, 'showUserList']);

Route::get('/users/search', [UsersController::class, 'search'])->name('user.search');


//投稿機能の実装
Route::get('/posts/create', [PostsController::class, 'create']);

Route::post('/posts', [PostsController::class, 'store']);





//フォローリスト画面の表示
Route::get('/follows/followList', [FollowsController::class, 'followList'])->name('followList');

//フォロワーリスト画面の表示
Route::get('/follows/followerList', [FollowsController::class, 'followerList'])->name('followerList');

//フォロー機能
Route::post('follow/{id}', [FollowsController::class, 'follow'])->middleware('auth')->name('follow');

//フォロー解除機能
Route::post('unfollow/{id}', [FollowsController::class, 'unfollow'])->middleware('auth')->name('unfollow');

Route::get('followers/{id}', [ProfileController::class, 'followerList'])->name('follower.list');

Route::get('following/{id}', [ProfileController::class, 'followingList'])->name('following.list');

require __DIR__ . '/auth.php';