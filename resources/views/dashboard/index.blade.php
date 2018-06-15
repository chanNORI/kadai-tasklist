@extends('layouts.app')

@section('content')
    <aside class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $user->name }}</h3>
            </div>
            <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
            </div>
        </div>
    </aside>
    <div class="col-xs-8">
        @if (Auth::user()->id == $user->id)
              {!! Form::open(['route' => 'tasks.store']) !!}
                  <div class="form-group">
                      {!! Form::text('taskname', old('taskname'), ['class' => 'form-control']) !!}
                      {!! Form::select('status', ['未完了' => '未完了', '完了' => '完了'], null, ['class' => 'form-control']) !!}
                      {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                  </div>
              {!! Form::close() !!}
        @endif
        @if (count($tasks) > 0)
            @include('tasks.tasks', ['tasks' => $tasks])
        @endif
    </div>
@endsection