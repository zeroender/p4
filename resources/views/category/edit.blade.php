@extends('layouts.master')

@section('title')
    Edit Category {{ $category->title }}
@endsection

@section('content')

    <h1>Edit Category {{ $category->title }} </h1>

    <form method='POST' action='/category/{{ $category->id }}'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <div class="form-group">
            <label class="col-form-label" for='name'>* Category Name</label>
            <input type='text' class="form-control" name='name' id='name' value='{{ old('name', $category->name) }}'>
            @include('modules.error-field', ['fieldName' => 'name'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='description'>* Description</label>
            <input type='text' class="form-control" name='description' id='description' value='{{ old('description', $category->description) }}'>
            @include('modules.error-field', ['fieldName' => 'description'])
        </div>

        <input type='submit' value='Update category' class='btn btn-primary btn-small'>
    </form>

@endsection
