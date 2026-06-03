<x-logout-layout>
    <!-- 適切なURLを入力してください -->
{!! Form::open(['url' => 'added.blade.php']) !!}

<h2 href="regist">新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@error('username')
    <p style="font-size:1.75rem">{{ $message }}</p>
@enderror

{{ Form::label('メールアドレス') }}
{{ Form::email('email',null,['class' => 'input']) }}
@error('email')
    <p style="font-size:1.75rem">{{ $message }}</p>
@enderror

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}
@error('password')
    <p style="font-size:1.75rem">{{ $message }}</p>
@enderror

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
@error('password_confirmation')
    <p style="font-size:1.75rem">{{ $message }}</p>
@enderror




{{ Form::submit('新規登録',['class' => 'btn btn-danger']) }}

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


</x-logout-layout>
