<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Category;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBy($value)
    {
        $tasks = Task::orderBy($value)->get();

        $value = ' ordered by '.$value;

        return view('task.index')->with([
            'tasks' => $tasks,
            'sortBy' => $value
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesForCheckboxes = Category::getForCheckboxes();

        return view('task.create')->with([
            'categoriesForCheckboxes' => $categoriesForCheckboxes
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
            'name' => 'required|min:3',
            'description' => 'required',
            'status'  => 'required'
        ]);

        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date', null);//or null
        //$task->list_id = $request->input('list_id');//or null
        $task->status = $request->input('status');
        $task->save();

        $task->categories()->sync($request->input('categories'));
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

        $categoriesForCheckboxes = Category::getForCheckboxes();

        $categoriesForThisTask = [];
        foreach ($task->categories as $category) {
            $categoriesForThisTask[] = $category->name;
        }

        return view('task.show')->with([
          'task' => $task,
          'categoriesForCheckboxes' => $categoriesForCheckboxes,
          'categoriesForThisTask' => $categoriesForThisTask
        ]);
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

        $categoriesForCheckboxes = Category::getForCheckboxes();

        $categoriesForThisTask = [];
        foreach ($task->categories as $category) {
            $categoriesForThisTask[] = $category->name;
        }

        return view('task.edit')->with([
            'task' => $task,
            'categoriesForCheckboxes' => $categoriesForCheckboxes,
            'categoriesForThisTask' => $categoriesForThisTask
        ]);
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

        $task->categories()->sync($request->input('categories'));

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date', null);//or null
        //$task->list_id = $request->input('list_id');//or null
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

        $task->categories()->detach();

        $task->delete();

        return redirect('/task')->with('alert', 'The task '.$task->name.' has been deleted');
    }
}
