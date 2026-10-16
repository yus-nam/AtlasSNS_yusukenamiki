<x-login-layout>


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


  <!-- <h2>機能を実装していきましょう。</h2> -->

    <h2>フォロワーリスト {{ $followers->count() }}</h2>

    @foreach ($followers as $user)
        @php
            $randomIcon = $icons[array_rand($icons)];
        @endphp
        <a>
            <img src="/images/{{ $randomIcon }}" alt="user-icon" class="user-icon">
        </a>
    @endforeach

    <ul>
        @foreach ($followers as $follower)
            <li>
                
                @foreach ($posts as $post)

                    @if ($post->user_id == $follower->id)

                        @php
                            $randomIcon = $icons[array_rand($icons)];
                        @endphp

                        <a href="{{ url('/profile/' . $follower->id) }}">
                            <img src="/images/{{ $randomIcon }}" alt="user-icon" class="user-icon">
                        </a>

                        {{ $follower->username }}

                        <div class="post">
                            <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                            <small>{{ $post->created_at }}</small> <!-- 投稿日時 -->
                        </div>
                    @endif
                @endforeach
            </li>
        @endforeach
    </ul>

    @if ($posts->isEmpty())
        <p>フォローされているユーザーの投稿はありません。</p>
    @endif

</x-login-layout>
