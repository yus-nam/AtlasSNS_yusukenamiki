<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <h2>フォロワーリスト {{ $followers->count() }}</h2>

  <ul>
    @foreach ($followers as $follower)
        <li>
            {{ $follower->name }}
            <button>
                フォロー解除
            </button>
        </li>
    @endforeach
  </ul>

</x-login-layout>
