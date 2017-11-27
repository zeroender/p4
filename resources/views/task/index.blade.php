@extends('layouts.master')

@push('head')

@endpush

@section('title')
    All Tasks
@endsection

@section('content')

    <h1>Tasks</h1>

    @foreach($tasks as $task)
        <div class='task cf'>
            <h2>{{ $task['name'] }}</h2>
            <a href='/task/{{ $task['id'] }}'>View</a> |
            <a href='/task/{{ $task['id'] }}/edit'>Edit</a> |
            <a href='/task/{{ $task['id'] }}/delete'>Delete</a>
        </div>
    @endforeach

@endsection
