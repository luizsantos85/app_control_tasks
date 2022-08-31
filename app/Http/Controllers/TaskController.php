<?php

namespace App\Http\Controllers;

use App\Exports\TasksExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\NovaTarefaMail;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $tasks = Task::where('user_id', $userId)->paginate(3);

        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all('tarefa', 'data_limite_conclusao');
        $data['user_id'] = auth()->user()->id;

        $task = Task::create($data);

        $userEmail = auth()->user()->email;
        Mail::to($userEmail)->send(new NovaTarefaMail($task));

        return redirect()->route('task.show', ['task' => $task->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $userId = auth()->user()->id;
        if ($task->user_id !== $userId) {
            return view('acesso-negado');
        }

        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $userId = auth()->user()->id;
        if ($task->user_id !== $userId) {
            return view('acesso-negado');
        }

        $task->update($request->all());
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $userId = auth()->user()->id;
        if ($task->user_id !== $userId) {
            return view('acesso-negado');
        }

        $task->delete();
        return redirect()->route('task.index');
    }

    public function exportaExcel()
    {
        return Excel::download(new TasksExport, 'tasks.xlsx');
    }
}
