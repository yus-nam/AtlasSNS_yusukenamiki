<x-logout-layout>
  <div id="clear">
    <p class="added">{{ session('username') }}さん</p>
    <p class="added">ようこそ！AtlasSNSへ！</p>

    <br>

    <p class="added added-second">ユーザー登録が完了いたしました。</p>
    <p class="added added-second">早速ログインをしてみましょう！</p>

    <p class="btn"><a href="login">ログイン画面へ</a></p>
  

  </div>
</x-logout-layout>
