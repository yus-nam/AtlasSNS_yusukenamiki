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










    <h2>フォローしているユーザー（{{ $followings->count() }}）</h2>
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
    </ul>

</x-login-layout>
