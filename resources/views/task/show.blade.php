@extends('layouts.master')

@push('head')
    <link href='/css/book/show.css' rel='stylesheet'>
@endpush

@section('title')
    {{ $task->name }}
@endsection

@section('content')

    <h2>{{ $task['title'] }}</h2>

    <p>Task Description {{ $task['description'] }}</p>
    <p>Task due {{ $task['due_date'] }}</p>

    <p><a href='/task/{{ $task['id'] }}/edit'>Edit</a></p>
    <p><a href='/task/{{ $task['id'] }}/delete'>Delete</a></p>

@endsection
