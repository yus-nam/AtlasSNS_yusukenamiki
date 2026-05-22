<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/index']) !!}

  <div class="container">
    <p>AtlasSNSへようこそ</p>

        {{ Form::label('メールアドレス')}}
        {{ Form::text('email',null,['class' => 'input']) }}
        {{ Form::label('パスワード')}}
        {{ Form::password('password',['class' => 'input']) }}

        {{ Form::submit('ログイン',['class' => 'btn btn-danger']) }}

    <p><a href="register">新規ユーザーの方はこちら</a></p>
    
  </div>



  {!! Form::close() !!}

</x-logout-layout>
