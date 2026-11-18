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

    <div class="page-content">
        <h2>フォローリスト: {{ $followingCount }}</h2>

        <!-- フォローリストのアイコン -->
        @foreach ($following as $user)
            @php
                $randomIcon = $icons[array_rand($icons)];
            @endphp
            <div class="icon-list">
                <a href="{{ url('/profile/' . $user->id) }}">
                    @if ($user->icon_image)
                        <img src="{{ asset('storage/' . $user->icon_image) }}" alt="user-icon" class="user-icon">
                    @else
                        <img src="{{ asset('images/' . $randomIcon) }}" alt="user-icon" class="user-icon">
                    @endif
                </a>  
            </div>
        @endforeach

            <ul>
                @foreach ($posts as $post)
                    @php
                        $randomIcon = $icons[array_rand($icons)];
                    @endphp

                    <div class="post-all">
                        <div class="about-user">
                            <a href="{{ url('/profile/' . $post->user_id) }}">
                                @if ($post->user && $post->user->icon_image)
                                    <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="user-icon" class="user-icon">
                                @else
                                    <img src="{{ asset('images/' . $randomIcon) }}" alt="user-icon" class="user-icon">
                                @endif
                            </a>

                            <small class="postUserName">{{ $post->user->username }}</small>

                            <small class="post-days">{{ $post->created_at->format('Y-m-d H：i') }}</small>
                        </div>

                        <p class="post-detail">{{ $post->post }}</p>

                    </div>

                @endforeach
            </ul>

        @if ($posts->isEmpty())
            <p>フォローしているユーザーの投稿はありません。</p>
        @endif

    </div>
</x-login-layout>
