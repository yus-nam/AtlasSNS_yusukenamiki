<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <h2>フォローしている人数: {{ $followingCount }}</h2>
  <ul>
    @foreach ($following as $followedUser)
        <li>{{ $followedUser->name }}</li>
    @endforeach
  </ul>

</x-login-layout>
