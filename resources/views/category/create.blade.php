@extends('layouts.master')

@section('title')
    Create new category
@endsection

@section('content')

    <h1>Add a category</h1>

    <form method='POST' action='/category'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <div class="form-group">
            <label class="col-form-label" for='name'>* Category Name</label>
            <input type='text' class="form-control" name='name' id='name' value='{{ old('name') }}'>
            @include('modules.error-field', ['fieldName' => 'name'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='description'>* Description</label>
            <input type='text' class="form-control" name='description' id='description' value='{{ old('description') }}'>
            @include('modules.error-field', ['fieldName' => 'description'])
        </div>

        <input type='submit' value='Add category' class='btn btn-primary btn-small'>
    </form>

@endsection
