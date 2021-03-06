<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Task;
use App\User;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $categories = $user->categories()->orderBy('name')->get();
        } else {
            $categories = [];
        }

        return view('category.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Display all categories to allow user to display tasks for a category
     *
     * @return \Illuminate\Http\Response
     */
    public function showTasksForCategory($id)
    {
        $user = Auth::user();

        if ($user) {
            $category = $user->categories()->where('id', '=', $id)->first();
            $tasks = $category->tasks;
        } else {
            $tasks = [];
        }

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
        return view('category.create');
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
            'description' => 'required'
        ]);

        $category = new category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->user_id = $request->user()->id;
        $category->save();

        return redirect('/category/'.$category->id)->with('alert', 'New category '.$request->input('name').' added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        if ($user) {
            $category = $user->categories()->find($id);
        }

        if (!$category) {
            return redirect('/category')->with('alert', 'category not found');
        }

        return view('category.show')->with(['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        if ($user) {
            $category = $user->categories()->find($id);
        }

        if (!$category) {
            return redirect('/category')->with('alert', 'Category not found');
        }

        return view('category.edit')->with(['category' => $category]);
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
            'description' => 'required'
        ]);

        $category = category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/category/'.$id)->with('alert', 'category '.$request->input('name').' updated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = Auth::user();

        if ($user) {
            $category = $user->categories()->find($id);
        }

        if (!$category) {
            return redirect('/category')->with('alert', 'category not found');
        }

        return view('category.delete')->with(['category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $name = $category['name'];

        $category->tasks()->detach();

        $category->delete();

        return redirect('/category')->with('alert', 'The category '.$category['name'].' has been deleted');
    }
}
