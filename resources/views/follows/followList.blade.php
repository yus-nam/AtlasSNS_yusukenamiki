<x-login-layout>


  <!-- <h2>機能を実装していきましょう。</h2>

  <p>フォローリストを取得</p>

  <h2>フォローしている人数: {{ $followingCount }}</h2>
  <ul>
    @foreach ($following as $followedUser)
        <li>{{ $followedUser->name }}</li>
    @endforeach
  </ul> -->



  <!-- resources/views/follows/followList.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>フォローリスト</title>
</head>
<body>
    <h1>フォローリストテストページ</h1>
    <p>{{ $test }}</p>
</body>
</html>



  

</x-login-layout>
