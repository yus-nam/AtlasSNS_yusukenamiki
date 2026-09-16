<x-logout-layout>
    <!-- 適切なURLを入力してください -->
<!-- {!! Form::open(['url' => 'added.blade.php']) !!} -->
<!-- {!! Form::open(['url' => 'register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@error('username')
    <p class="error-message">{{ $message }}</p>
@enderror

{{ Form::label('メールアドレス') }}
{{ Form::email('email',null,['class' => 'input']) }}
@error('email')
    <p class="error-message">{{ $message }}</p>
@enderror

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}
@error('password')
    <p class="error-message">{{ $message }}</p>
@enderror

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
@error('password_confirmation')
    <p class="error-message">{{ $message }}</p>
@enderror

{{ Form::submit('新規登録',['class' => 'btn btn-danger']) }}

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!} -->

<form action="{{ url('register') }}" method="POST">
    @csrf  <!-- CSRFトークンを埋め込む -->
    
    <h2>新規ユーザー登録</h2>

    <label for="username">ユーザー名</label>
    <input type="text" name="username" class="input" />
    @error('username')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <label for="email">メールアドレス</label>
    <input type="email" name="email" class="input" />
    @error('email')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <label for="password">パスワード</label>
    <input type="password" name="password" class="input" />
    @error('password')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <label for="password_confirmation">パスワード確認</label>
    <input type="password" name="password_confirmation" class="input" />
    @error('password_confirmation')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-danger">新規登録</button>
</form>

</x-logout-layout>
