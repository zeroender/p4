@extends('layouts.master')

@push('head')

@endpush

@section('title')
    All Categories
@endsection

@section('content')

    <h1>Categories</h1>
    <table class="table cf">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Associated Tasks</th>
          <th scope="col">View/Edit/Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
        <th scope="row">
            {{ $category['name'] }}
        </th>
        <td>
            {{ $category['description'] }}
        </td>
        <td>
            <a class="btn btn-secondary" href='/category/{{ $category['id'] }}/tasks'>View Tasks</a>
        </td>
        <td>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Select Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href='/category/{{ $category['id'] }}'>View</a>
                    <a class="dropdown-item" href='/category/{{ $category['id'] }}/edit'>Edit</a>
                    <a class="dropdown-item" href='/category/{{ $category['id'] }}/delete'>Delete</a>
                </div>
            </div>
        </td>
      </tr>

        @endforeach
      </tbody>
    </table>
@endsection
