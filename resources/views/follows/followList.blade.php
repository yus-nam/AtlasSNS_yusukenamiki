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
  
    @foreach ($following as $user)
        @php
            $randomIcon = $icons[array_rand($icons)];
        @endphp
        <a class="icon-list">
            @if ($user->icon_image)
                <img src="{{ asset('storage/' . $user->icon_image) }}" alt="user-icon" class="user-icon">
            @else
                <img src="{{ asset('images/' . $randomIcon) }}" alt="user-icon" class="user-icon">
            @endif
        </a>
    @endforeach

    <ul>
        @foreach ($posts as $post)
            @php
                $randomIcon = $icons[array_rand($icons)];
            @endphp

            <li>

                <a href="{{ url('/profile/' . $post->user_id) }}">
                    @if ($post->user && $post->user->icon_image)
                        <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="user-icon" class="user-icon">
                    @else
                        <img src="{{ asset('images/' . $randomIcon) }}" alt="user-icon" class="user-icon">
                    @endif
                </a>

                {{ $post->user->username }}

                <div class="post-list">
                    <p>{{ $post->post }}</p>
                    <small>{{ $post->created_at->format('Y-m-d H：i') }}</small>
                </div>

            </li>
        @endforeach
    </ul>

    @if ($posts->isEmpty())
        <p>フォローしているユーザーの投稿はありません。</p>
    @endif

</x-login-layout>
