<x-login-layout>



    <div class="profile-edit">
    <!-- <h1>{{ $user->name }}のプロフィール</h1> -->
    
        <label for="name">ユーザー名</label>
        <input type="text" id="name" name="name">

        <label for="email">メールアドレス</label>
        <input type="email" name="email" value="{{ $user->email }}">

        <label for="password">パスワード</label>
        <input type="password">

        <label for="password_confirmation">パスワード確認</label>
        <input type="password">
        
        <label for="introduce"></label>
        <textarea name="introduce" id="introduce"></textarea>
        
        <input type="file" alt="user-icon">アイコン画像

    </div>






</x-login-layout>