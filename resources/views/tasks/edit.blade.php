@extends('layouts.app')

@section('content')

<h1>id: {{ $task->id }} のタスク編集ページ</h1>


    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

    <div class="form-group">
        {!! Form::label('taskname', 'タスク名:') !!}
        {!! Form::text('taskname', null, ['class' => 'form-control']) !!}
    </div>
       
    <div class="form-group">
        {!! Form::label('status', '状況:') !!}
        {!! Form::select('status', ['未完了' => '未完了', '完了' => '完了'], null, ['class' => 'form-control']) !!}
    </div>

        {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}

@endsection