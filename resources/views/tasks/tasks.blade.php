<ul class="media-list">
@foreach ($tasks as $task)
    <?php $user = $task->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                <span class="text-muted">タスク作成時間 {{ $task->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($task->taskname)) !!}</p>
                <p>状態：{!! nl2br(e($task->status)) !!}</p>
            </div>
            <div>
                @if (Auth::user()->id == $task->user_id)
                    <p>
                        {!! link_to_route('tasks.edit', '編集', ['id' => $task->id], ['class' => 'btn btn-primary']) !!}
                    </p>
                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $tasks->render() !!}