<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        
        {
        // バリデーション
            // $request->validate([
            //     'email' => 'required|email',
            //     'password' => 'required',
            // ]);

            // 認証の試行
            if (Auth::attempt($request->only('email', 'password'))) {
                // 認証成功した場合、セッションを再生成
                $request->session()->regenerate();

                /** 追記箇所. ここから **/

                // フォロワー数とフォロー数を取得
                $followingsCount = $user->followings()->count();
                $followersCount = $user->followers()->count();

                session([
                    'followingsCount' => $followingsCount,
                    'followersCount' => $followersCount,
                ]);


                /** 追記箇所. ここまで **/


                // index（トップ）へリダイレクト
                return redirect('/index');
            }

            // 認証失敗時のエラーメッセージ
            return back()->withErrors([
                'email' => 'メールアドレスまたはパスワードが正しくありません。',
            ]);
        }



    }

}
