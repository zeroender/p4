@extends('layouts.master')

@section('title')
    Edit Task {{ $task->name }}
@endsection

@section('content')

    <h1>Editing Task: {{ $task->name }} </h1>

    <form method='POST' action='/task/{{ $task->id }}'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <div class="form-group">
            <label class="col-form-label" for='name'>* Task Name</label>
            <input type='text' class="form-control" name='name' id='name' value='{{ old('name', $task->name) }}'>
            @include('modules.error-field', ['fieldName' => 'name'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='description'>* Description</label>
            <input type='text' class="form-control" name='description' id='description' value='{{ old('description', $task->description) }}'>
            @include('modules.error-field', ['fieldName' => 'description'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='status'>* Status</label>
            <select type='dropdown' class="form-control" name='status' id='status'>
                <option value='not started' {{ (old('status') == 'not started' || ($task->status == 'not started' && old('status')==null)) ? 'selected' : ''}}>not started</option>
                <option value='in progress' {{ (old('status') == 'in progress' || ($task->status == 'in progress' && old('status')==null)) ? 'selected' : ''}}>in progress</option>
                <option value='completed' {{ (old('status') == 'completed' || ($task->status == 'completed' && old('status')==null)) ? 'selected' : ''}}>completed</option>
            </select>
            @include('modules.error-field', ['fieldName' => 'status'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='due_date'>Due Date</label>
            <input type='text' class="form-control" name='due_date' id='due_date' value='{{ old('due_date', $task->due_date) }}'>
            @include('modules.error-field', ['fieldName' => 'due_date'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='categories'>Categories</label>
            @include('task.categoriesForCheckboxes')
        </div>

        <div class="form-group clear">
            <input type='submit' value='Update Task' class='btn btn-primary btn-small'>
        </div>

        <div class="form-group clear">
            <a class='btn btn-primary btn-small' href='/task/{{ $task['id'] }}/'>View Task</a>
            <a class='btn btn-primary btn-small' href='/task/{{ $task['id'] }}/delete'>Delete Task</a>
        </div>
    </form>

@endsection

@push('body')
    <script src="/js/datepicker.js"></script>
@endpush
