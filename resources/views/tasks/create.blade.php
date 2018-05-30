@extends('layouts.app')

@section('content')

<h1>タスク新規作成ページ</h1>

{!! Form::model($task, ['route' => 'tasks.store']) !!}

{!! Form::label('taskname', 'タスク:') !!}
{!! Form::text('taskname') !!}

{!! Form::submit('投稿') !!}

{!! Form::close() !!}

@endsection