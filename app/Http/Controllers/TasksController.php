<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            
            return view('dashboard.index', $data);
            
        }
        else {
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'taskname' => 'required|max:191',
            'status' => 'required|max:10',
        ]);
        
        $request->user()->tasks()->create([
            'taskname' => $request->taskname,
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        
        abort_unless($task, 404);

        // return view('tasks.show', [
        //     'task' => $task,
        // ]);
        
        $user = \Auth::user();
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
        $user_id = $task->user_id;
        
        if (\Auth::check() && $user->id === $user_id) {
            return view('tasks.show', [
                'task' => $task,
            ]);
        }
        else {
            return view('welcome', [
                'task' => $task,
                'user' => $user,
                'tasks' => $tasks
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        abort_unless($task, 404);

        // return view('tasks.edit', [
        //     'task' => $task,
        // ]);
        
        $user = \Auth::user();
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
        $user_id = $task->user_id;
        
        if (\Auth::check() && $user->id === $user_id) {
            return view('tasks.edit', [
                'task' => $task,
            ]);
        }
        else {
            return view('welcome', [
                'task' => $task,
                'user' => $user,
                'tasks' => $tasks
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'taskname' => 'required|max:191',
            'status' => 'required|max:10',
        ]);
        
        $task = Task::find($id);
        $task->taskname = $request->taskname;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if (\Auth::user()->id === $task->user_id) {
            $task->delete();
        }
        
        return redirect()->back();
    }
}
