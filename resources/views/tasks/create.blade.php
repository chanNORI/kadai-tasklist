@extends('layouts.app')

@section('content')

<h1>タスク新規作成ページ</h1>


        {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
        <div class="form-group">
            {!! Form::label('taskname', 'タスク名:') !!}
            {!! Form::text('taskname', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('status', '状況:') !!}
            {!! Form::select('status', ['未完了' => '未完了', '完了' => '完了'], null, ['class' => 'form-control']) !!}
        </div>
        
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
        {!! Form::close() !!}

@endsection