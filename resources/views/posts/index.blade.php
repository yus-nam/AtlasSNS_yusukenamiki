<x-login-layout>


    <!-- <h2>機能を実装していきましょう。</h2> -->

    <div class="container">

        
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <textarea name="post" id="" placeholder="投稿内容を入力してください"></textarea>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <button type="submit" class="btn-type post"></button>
        </form>

        <div class="posts">
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
        
        @if (isset($posts))
        @foreach ($posts as $post)

            @php
                $randomIcon = $icons[array_rand($icons)];
            @endphp

            <div class="post">
                <p>{{ $post->post }}</p>

                <img src="/images/{{ $randomIcon }}" alt="icon">

                <button type="button" class="btn-type edit edit-button" data-id="{{ $post->id }}" data-content="{{ $post->post }}">
                </button>

                <button class="btn-type trash delete-button" data-id="{{ $post->id }}">
                </button>
            </div>

        @endforeach
        @endif
        </div>

        <!-- モーダルのサンプル -->
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

    </div>





    <!-- <script>
    $(document).ready(function() {
        $('.edit-button').on('click', function() {
            const postId = $(this).data('id');
            const postContent = $(this).data('content');

            // モーダルのtextareaに現在の投稿内容を入れる
            $('#content').val(postContent);

            // 更新先URLを設定
            $('#editForm').attr('action', '/posts/' + postId);

            // モーダルを表示
            $('#editModal').show();
            
        });

        // 右上のバツボタン
        $('.close-button').on('click', function() {
            $('#editModal').hide();
        });
    });
    </script> -->

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

    






</x-login-layout>
