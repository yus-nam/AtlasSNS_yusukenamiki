<x-login-layout>



    <div class="profile-edit">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

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
                <input type="text" id="username" name="username" placeholder="{{ $user->username }}">
            </div>

            <div class="form-parts">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div class="form-parts">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="変更する場合のみ入力してください">
            </div>

            <div class="form-parts">
                <label for="password_confirmation">パスワード確認</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="新しいパスワードを再入力してください">
            </div>

            <div class="form-parts">
                <label for="introduction">自己紹介</label>
                <textarea name="introduction" id="introduction" placeholder="自己紹介を入力してください">{{ old('introduction', $user->introduction) }}</textarea>
            </div>



            <div class="form-parts">
                <label for="icon">アイコン画像</label>
                <input type="file" alt="user-icon">
            </div>




            
            <br>
            <br>
            <br>

            <input type="submit" class="btn btn-profile" value="更新">
        </form>



    </div>

    






</x-login-layout>