@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>

    {!! Form::open(['route' => 'login.post']) !!}
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

            <p>ユーザ登録をまだしていませんか？ {!! link_to_route('signup.get', 'こちらからどうぞ') !!}</p>
@endsection