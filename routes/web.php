<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
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

Route::post('/login', [UsersController::class, 'login']);

Route::get('profile', [ProfileController::class, 'profile']);

Route::get('search', [UsersController::class, 'index']);

Route::get('follow-list', [PostsController::class, 'index']);

Route::get('follower-list', [PostsController::class, 'index']);

Route::post('follow/{id}', [FollowsController::class, 'follow'])->name('follow');

Route::post('unfollow/{id}', [FollowsController::class, 'unfollow'])->name('unfollow');

Route::get('followers/{id}', [ProfileController::class, 'followerList'])->name('follower.list');

Route::get('following/{id}', [ProfileController::class, 'followingList'])->name('following.list');



require __DIR__ . '/auth.php';