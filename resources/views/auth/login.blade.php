<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => 'login']) !!}

  <div class="container">
    <p class="subtitle">AtlasSNSへようこそ</p>

    <div class="form-area">

        {{ Form::label('メールアドレス')}}
        {{ Form::text('email',null,['class' => 'input']) }}
        
        {{ Form::label('パスワード')}}
        {{ Form::password('password',['class' => 'input']) }}

        {{ Form::submit('ログイン',['class' => 'btn btn-danger']) }}

    </div>





    <p><a href="register">新規ユーザーの方はこちら</a></p>
    
  </div>

  {!! Form::close() !!}

</x-logout-layout>
