<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <h2>フォローリスト: {{ $followingCount }}</h2>
  
  <ul>
    @foreach ($following as $followedUser)
        <li>
            {{ $followedUser->name }}
            <button class="unfollow-button" data-user-id="{{ $followedUser->id }}">
                フォロー解除
            </button>
        </li>
    @endforeach
  </ul>

</x-login-layout>
