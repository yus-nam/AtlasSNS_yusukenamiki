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
                <img src="/images/icon3.png" alt="">
                <button class="btn-type edit"></button>

                <button class="btn-type trash"></button>
            </div>
            @endforeach
        @endif

        </div>







        
       
    </div>

</x-login-layout>
