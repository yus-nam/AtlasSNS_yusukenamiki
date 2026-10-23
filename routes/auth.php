<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('top');;
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('added', [RegisteredUserController::class, 'added'])->name('added');
    // Route::post('added', [RegisteredUserController::class, 'added']);

});
Route::get('/index', function () {
    
    $posts = Post::orderBy('created_at', 'desc')->get();
    // ログイン成功時のみ表示されるページ
    return view('posts.index', compact('posts'));

})->middleware('auth');


//ログイン中のユーザだけがログアウトできる
Route::middleware('auth')->group(function () {
    //ログアウト処理をpostで呼び出して実行、その結果をroute('logout')で呼び出す
    Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
});


    
    

    