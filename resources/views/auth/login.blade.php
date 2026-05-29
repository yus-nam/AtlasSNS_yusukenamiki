<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => 'login']) !!}

  <div class="container">
    <p class="subtitle">AtlasSNSへようこそ</p>

    <div class="form-area">

        {{ Form::label('メールアドレス')}}
        {{ Form::text('email',null,['class' => 'input']) }}
        @error('email')
            <p style="font-size:1.75rem">{{ $message }}</p>
        @enderror
        
        {{ Form::label('パスワード')}}
        {{ Form::password('password',['class' => 'input']) }}
        @error('password')
            <p style="font-size:1.75rem">{{ $message }}</p>
        @enderror

        @error('login')
            <p style="font-size:1.75rem">{{ $message }}</p>
        @enderror

        {{ Form::submit('ログイン',['class' => 'btn btn-danger']) }}

    </div>
    
    <p><a href="register">新規ユーザーの方はこちら</a></p>
    
  </div>

  {!! Form::close() !!}

</x-logout-layout>
