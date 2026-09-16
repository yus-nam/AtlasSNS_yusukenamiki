<x-login-layout>

    <h1>ユーザ検索</h1>
    
    <form action="{{ route('user.search') }}" method="GET">
        <input type="text" name="username" placeholder="ユーザ名を入力">
        <button type="submit" class="btn-type search"></button>
        @if ($username)
            <span>検索ワード：{{ $username }}</span>
        @endif
    </form>

    <div class="user-list">
        @if($users->isEmpty())
            <p>ユーザーが見つかりませんでした。</p>
        @else
            <ul>
                @foreach ($users as $user)
                    <!-- カラム名に合わせて調整してください（username または name） -->
                    <li class="user-list">
                        {{ $user->username }} ({{ $user->email }})
                        

                        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                            @csrf
                        <button type="submit">フォロー</button>
                        </form>
                        
                        
                        <!-- <button class="btn followButton" data-user-id="{{ $user->id }}">フォロー</button> ここでボタンを追加 -->
                    </li>
                @endforeach
            </ul>
        @endif
    </div>





    
<!-- Javascript部分 -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".followButton").click(function() {
                let button = $(this);
                let userId = button.data('user-id');

                if (button.text() === "フォロー") {
                    button.text("フォロー解除");
                    $.post('/follow', { 
                        userId: userId, 
                        _token: '{{ csrf_token() }}'  
                    }).done(function(response) {
                        if (response.success) {
                            location.reload(true); // フォロー成功後にページをリロード
                        }
                    });
                } else {
                    button.text("フォロー");
                    $.post('/unfollow', { 
                        userId: userId, 
                        _token: '{{ csrf_token() }}'  
                    }).done(function(response) {
                        if (response.success) {
                            location.reload(true); // フォロー解除成功後にページをリロード
                        }
                    });
                }
            });
        });

    </script> -->


</x-login-layout>
