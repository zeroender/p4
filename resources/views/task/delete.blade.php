@extends('layouts.master')

@section('title')
    Delete task {{ $task->name }}
@endsection

@section('content')

    <h3>Delete Task</h3>

    <h5>Do you really want to delete "{{ $task->name }}"?</h5>

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
