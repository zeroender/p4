@extends('layouts.master')

@section('title')
    Delete task {{ $task->name }}
@endsection

@section('content')

    <h1>Delete Task</h1>

    <p>Do you wish to delete "{{ $task->name }}"?</p>

    <form method='POST' action='/task/{{ $task->id }}'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <input type='submit' value='Yes, Delete this task' class='btn btn-primary btn-small'>
    </form>

@endsection
