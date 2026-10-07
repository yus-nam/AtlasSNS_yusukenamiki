<x-login-layout>


  <!-- <h2>機能を実装していきましょう。</h2> -->

  <h2>フォロワーリスト {{ $followers->count() }}</h2>

  <ul>
    @foreach ($followers as $follower)
        <li>
            {{ $follower->username }}
            <!-- <button class="unfollow-button" data-user-id="{{ $follower->id }}">
                フォロー解除
            </button> -->
        </li>
    @endforeach
  </ul>

</x-login-layout>
