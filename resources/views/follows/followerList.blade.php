<x-login-layout>

  <!-- <h2>機能を実装していきましょう。</h2> -->

    <h2>フォロワーリスト {{ $followers->count() }}</h2>

    <ul>
        @foreach ($followers as $follower)
            <li>
                
                @foreach ($posts as $post)

                <!-- {{ $follower->username }}  ここに書くとユーザBは名前だけがユーザAの投稿数分、表示されてしまう-->

                    @if ($post->user_id == $follower->id)

                        {{ $follower->username }}

                        <div class="post">
                            <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                            <small>{{ $post->created_at }}</small> <!-- 投稿日時 -->
                        </div>
                    @endif
                @endforeach
            </li>
        @endforeach
    </ul>

    @if ($posts->isEmpty())
        <p>フォローされているユーザーの投稿はありません。</p>
    @endif






</x-login-layout>
