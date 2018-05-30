@extends('layouts.app')

@section('content')

<h1>id: {{ $task->id }} のタスク編集ページ</h1>

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        {!! Form::label('taskname', 'タスク:') !!}
        {!! Form::text('taskname') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection