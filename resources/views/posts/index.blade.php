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
        @if (isset($posts))
            @foreach ($posts as $post)
            <div class="post">
                <p>{{ $post->post }}</p>
                <img src="/images/icon3.png" alt="icon3">
                <button type="submit" class="btn-type edit edit-button" data-id="{{ $post->id }}"></button>

                <button class="btn-type trash delete-button" data-id="{{ $post->id }}"></button>
            </div>
            @endforeach
        @endif

        </div>

        <!-- モーダルのサンプル -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close-button">&times;</span>
                <form id="editForm">
                    <textarea name="content" id="content"></textarea>
                    <button type="submit">更新</button>
                </form>
            </div>
        </div>

    </div>





    <script>
    $(document).ready(function() {
        $('.edit-button').on('click', function() {
            const postId = $(this).data('id');

            $.ajax({
                url: '', // 現在のファイル名を指定
                method: 'POST',
                data: { id: postId },
                dataType: 'json',
                success: function(response) {
                    $('#content').val(response.content);
                    $('#editModal').show();
                },
                error: function(xhr, status, error) {
                    console.error("エラーが発生しました: " + error);
                }
            });
        });

        $('.close-button').on('click', function() {
            $('#editModal').hide();
        });
    });
    </script>










</x-login-layout>
