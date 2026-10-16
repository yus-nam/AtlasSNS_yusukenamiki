<x-login-layout>

    <h1>{{ $user->username }}のプロフィール</h1>

    @if (Auth::id() !== $user->id)

        @if ($isFollowing)
            <form action="{{ url('/unfollow/' . $user->id) }}" method="POST">
                @csrf
                <button type="submit">フォロー解除</button>
            </form>
        @else
            <form action="{{ url('/follow/' . $user->id) }}" method="POST">
                @csrf
                <button type="submit">フォロー</button>
            </form>
        @endif

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

    <!-- ここから先追記(10/16) -->


    @if (isset($posts))
    @foreach ($posts as $post)

    @php
        $randomIcon = $icons[array_rand($icons)];
    @endphp

        <div class="post-block">
            <p>{{ $post->post }}</p>

            <div class="personal-post">
                <a href="{{ url('/profile/' . $post->user_id) }}">
                    <img src="/images/{{ $randomIcon }}" alt="user-icon" class="user-icon">
                </a>

                <button type="button" class="btn-type edit edit-button" data-id="{{ $post->id }}" data-content="{{ $post->post }}">
                </button>
            
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('この投稿を削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-type trash"></button>
                </form>
        
            </div>


        </div>
    @endforeach
    @endif
    <!-- ここから先追記(10/16) -->




    <!-- <h2>フォロー（{{ $followings->count() }}）</h2>
    <ul>
        @foreach ($followings as $following)
            <li>{{ $following->name }}</li>
        @endforeach
    </ul>

    <h2>フォロワー（{{ $followers->count() }}）</h2>
    <ul>
        @foreach ($followers as $follower)
            <li>{{ $follower->name }}</li>
        @endforeach
    </ul> -->

</x-login-layout>
