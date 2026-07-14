<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <p>フォロワーリストを取得</p>

  <!-- followerList.blade.php -->
  <h2>フォロワー人数: {{ $followers->count() }}</h2>
  <ul>
    @foreach ($followers as $follower)
        <li>{{ $follower->name }}</li>
    @endforeach
  </ul>




  
</x-login-layout>
