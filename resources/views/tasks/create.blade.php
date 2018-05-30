@extends('layouts.app')

@section('content')

<h1>タスク新規作成ページ</h1>

{!! Form::model($task, ['route' => 'tasks.store']) !!}

{!! Form::label('taskname', 'タスク名:') !!}
{!! Form::text('taskname') !!}

{!! Form::label('status', '状況:') !!}
{!! Form::select('status', ['未完了' => '未完了', '完了' => '完了']) !!}

{!! Form::submit('投稿') !!}

{!! Form::close() !!}

@endsection