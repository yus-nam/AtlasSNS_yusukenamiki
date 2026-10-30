<x-login-layout>



    <div class="profile-edit">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif


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
                <label for="username">ユーザー名</label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}">
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
                <label for="bio">自己紹介</label>
                <textarea name="bio" id="bio" placeholder="自己紹介を入力してください">{{ old('bio', $user->bio) }}</textarea>
            </div>



            <div class="form-parts">
                <label for="icon">アイコン画像</label>
                <input type="file" name="icon_image" alt="user-icon" accept="image/*">
            </div>





            <br>
            <br>
            <br>

            <input type="submit" class="btn btn-profile" value="更新">
        </form>



    </div>

    






</x-login-layout>