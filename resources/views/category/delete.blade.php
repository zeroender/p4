@extends('layouts.master')

@section('title')
    Delete category {{ $category->name }}
@endsection

@section('content')

    <h1>Delete Category</h1>

    <p>Do you wish to delete "{{ $category->name }}"?</p>
    <p>This will not delete any associated tasks</p>

    <form method='POST' action='/category/{{ $category->id }}'>

        {{ method_field('delete') }}

        {{ csrf_field() }}

        <input type='submit' value='Yes, Delete this category' class='btn btn-primary btn-small'>
    </form>

@endsection
