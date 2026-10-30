<x-login-layout>

    @php
        $icons = [
            'icon1.png',
            'icon2.png',
            'icon3.png',
            'icon4.png',
            'icon5.png',
            'icon6.png',
            'icon7.png',
        ];
    @endphp

    @php
        $randomIcon = $icons[array_rand($icons)];
    @endphp

    <div class="user-prof">
        <img src="/images/{{ $randomIcon }}" alt="user-icon" class="user-icon">

        <div class="user-prof-text">
            <p>ユーザー名 {{ $user->username }}</p>

            <p>自己紹介 {{ $user->bio }}</p>
        </div>

        @if (Auth::id() !== $user->id)

        <div class="user followButton">
            @if ($isFollowing)
                <form action="{{ url('/unfollow/' . $user->id) }}" method="POST">
                    @csrf
                    <button type="submit">フォロー解除</button>
                </form>
            @else
                <form action="{{ url('/follow/' . $user->id) }}" method="POST">
                    @csrf
                    <button type="submit">フォロー</button>
                </form>
            @endif
        </div>

    @endif

    </div>


    


    

    <!-- ここから先追記(10/16) -->


    @if (isset($posts))
    @foreach ($posts as $post)

    @php
        $randomIcon = $icons[array_rand($icons)];
    @endphp

        <div class="post-block">
            <p>{{ $post->post }}</p>

            <div class="personal-post">
                <a href="{{ url('/profile/' . $post->user_id) }}">
                    <img src="/images/{{ $randomIcon }}" alt="user-icon" class="user-icon">
                </a>

            @if(Auth::id() === $post->user_id)
                <button type="button" class="btn-type edit edit-button" data-id="{{ $post->id }}" data-content="{{ $post->post }}">
                </button>
            @endif

            @if(Auth::id() === $post->user_id)
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('この投稿を削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-type trash"></button>
                </form>
            @endif

            </div>

        </div>
    @endforeach
    @endif
    <!-- ここから先追記(10/16) -->


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const buttons = document.querySelectorAll('.edit-button');

        buttons.forEach(function (button) {

            button.addEventListener('click', function () {

                // 投稿IDを取得
                const postId = this.dataset.id;

                // 投稿内容を取得
                const content = this.dataset.content;

                // テキストエリアに投稿内容を入れる
                document.getElementById('content').value = content;

                // 更新先URLを設定
                document.getElementById('editForm').action = '/posts/' + postId;

                // モーダルを表示
                document.getElementById('editModal').style.display = 'block';

            });

        });

        // ×ボタン
        document.querySelector('.close-button').addEventListener('click', function () {
            document.getElementById('editModal').style.display = 'none';
        });

    });
</script>

<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <textarea name="content" id="content"></textarea>

            <button type="submit" id="update" class="btn-type edit"></button>
        </form>
    </div>
</div>





</x-login-layout>
