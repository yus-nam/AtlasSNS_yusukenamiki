<x-login-layout>



    <div class="profile-edit">
    <!-- <h1>{{ $user->name }}のプロフィール</h1> -->
            @php
                $icons = [
                    'icon1.png',
                    'icon2.png',
                    'icon3.png',
                    'icon4.png',
                    'icon5.png',
                    'icon6.png',
                    'icon7.png',
                ];
            @endphp
        

            @php
                $randomIcon = $icons[array_rand($icons)];
            @endphp
            
            <img src="/images/{{ $randomIcon }}" alt="user-icon" class="user-icon">

        

        <div class="form-parts">
            <label for="name">ユーザー名</label>
            <input type="text" id="name" name="name" placeholder="{{ $user->username }}">
        </div>

        <div class="form-parts">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" placeholder="{{ $user->email }}">
        </div>

        <div class="form-parts">
            <label for="password">パスワード</label>
            <input type="password" placeholder="パスワードを入力してください">
        </div>

        <div class="form-parts">
            <label for="password_confirmation">パスワード確認</label>
            <input type="password" placeholder="パスワード確認のためにもう一度入力してください">
        </div>

        <div class="form-parts">
            <label for="introduction">自己紹介</label>
            <textarea name="introduction" id="introduction" placeholder="{{ $user->introduction ?: '自己紹介を入力してください' }}">{{ $user->introduction }}</textarea>
        </div>

        <div class="form-parts">
            <label for="icon">アイコン画像</label>
            <input type="file" alt="user-icon">
        </div>

        <br>
        <br>
        <br>

        <input type="submit" value="更新">

    </div>

    






</x-login-layout>