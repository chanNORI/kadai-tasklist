@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ユーザ登録</h1>
    </div>

    {!! Form::open(['route' => 'signup.post']) !!}
        <div class="form-group">
            {!! Form::label('name', 'お名前') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'メールアドレス') !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'パスワード') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'パスワードの確認') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('age', '年齢') !!}
            {!! Form::text('age', old('email'), ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
            
@endsection