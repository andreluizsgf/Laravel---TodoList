<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all()->sortBy(function($task){
            return $task->is_done;
        }); //ordena as tasks por status de finalização.
        
        return view('panel.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task([
            'description' => $request->get('description'),
        ]);
        $task->save();
        return redirect()->route('panel.task.index')->with('success', 'Task criada com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($task) //Atualiza o status de uma tarefa para "done"
    {
        $task = Task::find($task);
        
        if($task->is_done = 2) //Caso a tarefa já esteja finalizada, envia um erro.
            return redirect()->route('panel.task.index')->withErrors('Essa tarefa já foi finalizada!');
        
        $task->is_done = 2;
        $task->done_date = Carbon::now()->format('Y-m-d');
        $task->save();
        
        return redirect()->route('panel.task.index')->with('success', 'Parabéns por finalizar uma tarefa! :)');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect()->route('panel.task.index')->with('success', 'Tarefa deletada com sucesso.');
    }
}
