<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('name')->get();

        return view('task.index')->with([
            'tasks' => $tasks
        ]);
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
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required',
            'status'  => 'required'
        ]);

        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date', null);//or null
        $task->dependent_task_id = $request->input('dependent_task_id', null);//or null
        $task->list_id = $request->input('list_id');//or null
        $task->status = $request->input('status');
        $task->save();

        //TODO make sure save did not throw an error!

        //If no error:
        return redirect('/task')->with('alert', 'New task '.$request->input('name').' added');
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

        if (!$task) {
            return redirect('/task')->with('alert', 'Task not found');
        }

        return view('task.show')->with(['task' => $task]);
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

        if (!$task) {
            return redirect('/task')->with('alert', 'Task not found');
        }

        return view('task.edit')->with(['task' => $task]);
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
            'name' => 'required|min:3',
            'description' => 'required',
            'status'  => 'required'
        ]);

        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date', null);//or null
        $task->dependent_task_id = $request->input('dependent_task_id', null);//or null
        $task->list_id = $request->input('list_id');//or null
        $task->status = $request->input('status');
        $task->save();

        //TODO make sure save did not throw an error!

        //If no error:
        return redirect('/task')->with('alert', 'Task '.$request->input('name').' updated');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect('/task')->with('alert', 'Task not found');
        }

        return view('task.delete')->with(['task' => $task]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $task = Task::find($id);

        $name = $task['name'];

        $task->delete();

        return redirect('/task')->with('alert', 'The task '.$name.' has been deleted');
    }
}
