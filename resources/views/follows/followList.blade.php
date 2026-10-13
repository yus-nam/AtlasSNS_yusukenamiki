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

    <h2>フォローリスト: {{ $followingCount }}</h2>
  
    <ul>
        @foreach ($following as $followedUser)
            <li>
                @foreach ($posts as $post)

                    @if ($post->user_id == $followedUser->id)

                        @php
                            $randomIcon = $icons[array_rand($icons)];
                        @endphp

                        <a href="{{ url('/profile/' . $followedUser->id) }}">
                            <img src="/images/{{ $randomIcon }}" alt="user-icon" class="user-icon">
                        </a>

                    {{ $followedUser->username }}

                        <div class="post">
                            <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                            <small>{{ $post->created_at }}</small> <!-- 投稿日時 -->
                        </div>
                    @endif
                @endforeach

                <!-- <button class="unfollow-button" data-user-id="{{ $followedUser->id }}">
                    フォロー解除
                </button> -->
            </li>
        @endforeach
    </ul>

    @if ($posts->isEmpty())
        <p>フォローしているユーザーの投稿はありません。</p>
    @endif

</x-login-layout>
