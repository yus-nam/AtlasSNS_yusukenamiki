<x-login-layout>

    <h1>ユーザ検索</h1>
    
    <form action="{{ route('user.search') }}" method="GET">
        <input type="text" name="username" placeholder="ユーザ名を入力">
        <button type="submit" class="btn-type search"></button>
    </form>

</x-login-layout>
