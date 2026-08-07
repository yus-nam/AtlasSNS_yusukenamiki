<x-login-layout>


    <!-- <h2>機能を実装していきましょう。</h2> -->

    <div class="container">

        <!-- <form action="/posts" method="POST">
            @csrf
            <div>
                <label for="title">タイトル：</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <br>
            <div>
                <label for="body">本文：</label>
                <textarea id="body" name="body" required>{{ old('body') }}</textarea>
            </div>
            <br>
            <button type="submit">投稿する</button>
        </form> -->



        投稿内容を入力してください
        <!-- <button class="btn-type"><img src="{{ asset('images/post.png') }}" alt="送信"></button> -->
        <button class="btn-type post"></button>

        <!-- <button class="btn-type edit"><img src="{{ asset('images/edit.png') }}" alt="編集"></button> -->
        <button class="btn-type edit"></button>

        <!-- <button class="btn-type"><img src="{{ asset('images/trash.png') }}" alt="削除"></button> -->
         <button class="btn-type trash"></button>
       
    </div>

</x-login-layout>
