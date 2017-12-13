@extends('layouts.master')

@section('title')
    View Category {{ $category->name }}
@endsection

@section('content')

    <h1>Viewing Category: {{ $category->name }} </h1>

    <div class='clear'></div>

    <div class="form-group">
        <label class="col-form-label" for='name'>Category Name</label>
        <input type='text' disabled='true' class="form-control" name='name' id='name' value='{{ $category['name'] }}'>
    </div>

    <div class="form-group">
        <label class="col-form-label" for='description'>Description</label>
        <input type='text' disabled='true' class="form-control" name='description' id='description' value='{{ $category['description'] }}'>
        @include('modules.error-field', ['fieldName' => 'description'])
    </div>

    <div class="form-group clear">
        <a class='btn btn-primary btn-small' href='/category/{{ $category['id'] }}/edit'>Edit Category</a>
        <a class='btn btn-primary btn-small' href='/category/{{ $category['id'] }}/delete'>Delete Category</a>
    </div>

@endsection
