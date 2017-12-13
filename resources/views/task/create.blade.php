@extends('layouts.master')

@section('title')
    Create new task
@endsection

@section('content')

    <h1>Create a new task</h1>

    <form method='POST' action='/task'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <div class="form-group">
            <label class="col-form-label" for='name'>* Task Name</label>
            <input type='text' class="form-control" name='name' id='name' value='{{ old('name') }}'>
            @include('modules.error-field', ['fieldName' => 'name'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='description'>* Description</label>
            <input type='text' class="form-control" name='description' id='description' value='{{ old('description') }}'>
            @include('modules.error-field', ['fieldName' => 'description'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='status'>* Status</label>
            <select type='dropdown' class="form-control" name='status' id='status' value='{{ old('status') }}'>
                <option>not started</option>
                <option>in progress</option>
                <option>completed</option>
            </select>
            @include('modules.error-field', ['fieldName' => 'status'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='due_date'>Due Date</label>
            <input type='text' class="form-control" name='due_date' id='due_date' value='{{ old('due_date') }}'>
            @include('modules.error-field', ['fieldName' => 'due_date'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='categories'>Categories</label>
            @include('task.categoriesForCheckboxes')
        </div>

        <div class="form-group clear">
            <input type='submit' value='Add task' class='btn btn-primary btn-small'>
        </div>

    </form>

@endsection

@push('body')
    <script src="/js/datepicker.js"></script>
@endpush
