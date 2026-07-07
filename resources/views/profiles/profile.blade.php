<x-login-layout>

    <h1>{{ $user->name }}のプロフィール</h1>

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
