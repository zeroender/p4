@extends('layouts.master')

@section('title')
    View Task {{ $task->name }}
@endsection

@section('content')

    <h1>Viewing Task: {{ $task->name }}</h1>

    <div class='clear'></div>

    <div class="form-group">
        <label class="col-form-label" for='name'>Task Name</label>
        <input type='text' class="form-control" disabled='true' value='{{ $task['name'] }}'>
    </div>

    <div class="form-group">
        <label class="col-form-label" for='name'>Description</label>
        <input type='text' class="form-control" disabled='true' value='{{ $task['description'] }}'>
    </div>

    <div class="form-group">
        <label class="col-form-label" for='name'>Status</label>
        <input type='text' class="form-control" disabled='true' value='{{ $task['status'] }}'>
    </div>

    <div class="form-group">
        <label class="col-form-label" for='name'>Due Date</label>
        <input type='text' class="form-control" disabled='true' value='{{ $task['due_date'] }}'>
    </div>

    <div class="form-group">
        <label class="col-form-label" for='categories'>Categories</label>
        @include('task.categoriesForCheckboxesDisplay')
    </div>

    <div class="form-group clear">
        <a class='btn btn-primary btn-small' href='/task/{{ $task['id'] }}/edit'>Edit Task</a>
        <a class='btn btn-primary btn-small' href='/task/{{ $task['id'] }}/delete'>Delete Task</a>
    </div>

@endsection
