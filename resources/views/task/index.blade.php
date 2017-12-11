@extends('layouts.master')

@push('head')
    <link href='/css/task.css' rel='stylesheet'>
@endpush

@section('title')
    Tasks
@endsection

@section('content')

    <h1>Tasks {{ isset($sortBy) ? $sortBy : '' }}</h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Due Date</th>
          <th scope="col">Status</th>
          <th scope="col">View/Edit/Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">
                    {{ $task['name'] }}
                </th>
                <td>
                    {{ $task['due_date'] }}
                </td>
                <td>
                    {{ $task['status'] }}
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/task/{{ $task['id'] }}">View</a>
                            <a class="dropdown-item" href="/task/{{ $task['id'] }}/edit">Edit</a>
                            <a class="dropdown-item" href="/task/{{ $task['id'] }}/delete">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>

@endsection
