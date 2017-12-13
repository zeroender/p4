@extends('layouts.master')

@section('title')
    Delete task {{ $task->name }}
@endsection

@section('content')

    <h1>Delete Task: {{ $task->name }}</h1>

    <p>Do you really want to delete "{{ $task->name }}"?</p>

    <form method='POST' action='/task/{{ $task->id }}'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <div class="form-group clear">
            <input type='submit' value='Yes, Delete this task' class='btn btn-primary btn-small'>
        </div>
    </form>

    <div class="form-group clear">
        <a class='btn btn-primary btn-small' href='/task/{{ $task['id'] }}/'>View Task</a>
        <a class='btn btn-primary btn-small' href='/task/{{ $task['id'] }}/edit'>Edit Task</a>
    </div>
@endsection
