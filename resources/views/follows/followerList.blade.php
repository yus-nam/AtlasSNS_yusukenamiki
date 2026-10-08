<x-login-layout>


  <!-- <h2>機能を実装していきましょう。</h2> -->

    <h2>フォロワーリスト {{ $followers->count() }}</h2>

    <ul>
    @foreach ($followers as $follower)
        <li>
            {{ $follower->username }}
            @foreach ($posts as $post)
                @if ($post->user_id == $follower->id)
                    <div class="post">
                        <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                        <small>{{ $post->created_at }}</small> <!-- 投稿日時 -->
                    </div>
                @endif
            @endforeach

            @if ($posts->isEmpty())
                <p>フォローされているユーザーの投稿はありません。</p>
            @endif
            
            
        </li>
    @endforeach
    </ul>








</x-login-layout>
