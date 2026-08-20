<x-login-layout>

    <h1>ユーザ検索</h1>
    
    <form action="{{ route('user.search') }}" method="GET">
        <input type="text" name="username" placeholder="ユーザ名を入力">
        <button type="submit" class="btn-type search"></button>
    </form>

    <div class="user-list">
        @if($users->isEmpty())
            <p>ユーザーが見つかりませんでした。</p>
        @else
            <ul>
                @foreach ($users as $user)
                    <!-- カラム名に合わせて調整してください（username または name） -->
                    <li>{{ $user->username }} ({{ $user->email }})</li>
                @endforeach
            </ul>
        @endif
    </div>











</x-login-layout>
