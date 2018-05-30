@extends('layouts.app')

@section('content')

<h1>id: {{ $task->id }} のタスク編集ページ</h1>

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        {!! Form::label('taskname', 'タスク名:') !!}
        {!! Form::text('taskname') !!}
        
        {!! Form::label('status', '状況:') !!}
        {!! Form::select('status', ['未完了' => '未完了', '完了' => '完了']) !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection