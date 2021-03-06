@extends('layouts.master')

@section('title')
    Delete category {{ $category->name }}
@endsection

@section('content')

    <h1>Delete Category: {{ $category->name }}</h1>

    <p>Do you wish to delete "{{ $category->name }}"?</p>
    <p>This will not delete any associated tasks</p>

    <form method='POST' action='/category/{{ $category->id }}'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <input type='submit' value='Yes, Delete this category' class='btn btn-primary btn-small'>
    </form>

    <div class="form-group clear">
        <a class='btn btn-primary btn-small' href='/category/{{ $category['id'] }}/'>View Category</a>
        <a class='btn btn-primary btn-small' href='/category/{{ $category['id'] }}/edit'>Edit Category</a>
    </div>

@endsection
