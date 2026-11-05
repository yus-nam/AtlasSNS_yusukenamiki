<x-login-layout>
    
    <div class="search-box">
        <form action="{{ route('user.search') }}" method="GET">
            <input type="text" name="username" placeholder="ユーザ名を入力">
            <button type="submit" class="btn-type search"></button>
            @if ($username)
                <span>検索ワード：{{ $username }}</span>
            @endif
        </form>
    </div>


    <div class="user-list-container">
        @if($users->isEmpty())
            <p>ユーザーが見つかりませんでした。</p>
        @else

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

            <ul>
                @foreach ($users as $user)

                    @php
                        $randomIcon = $icons[array_rand($icons)];
                    @endphp


                <!-- カラム名に合わせて調整してください（username または name） -->
                <li class="user-list">

                <a href="{{ url('/profile/' . $user->id) }}" class="user-icon">

                @if ($user->icon_image)
                    <img src="{{ asset('storage/' . $user->icon_image) }}" alt="user-icon" class="user-icon">
                @else
                    <img src="{{ asset('images/' . $randomIcon) }}" alt="user-icon" class="user-icon">
                @endif

                </a>

                {{ $user->username }}
         

                @if (!Auth::user()->followings()->where('followed_id', $user->id)->exists())
                {{-- まだフォローしていない --}}
                <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit">フォロー</button>
                </form>

                @else

                {{-- すでにフォローしている --}}
                <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit">フォロー解除</button>
                </form>

                @endif

                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</x-login-layout>
