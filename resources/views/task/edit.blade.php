@extends('layouts.master')

@section('title')
    Edit Task {{ $task->title }}
@endsection

@section('content')

    <h1>Edit Task {{ $task->title }} </h1>

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
                <option value='blocked' {{ (old('status') == 'blocked' || ($task->status == 'blocked' && old('status')==null)) ? 'selected' : ''}}>blocked</option>
            </select>
            @include('modules.error-field', ['fieldName' => 'status'])
        </div>

        <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <label class="col-form-label" for='due_date'>Due Date</label>
                <input type='text' class="form-control" name='due_date' id='due_date' value='{{ old('due_date', $task->due_date) }}'>
                @include('modules.error-field', ['fieldName' => 'due_date'])
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label" for='list_id'>Category</label>
            <input type='text' class="form-control" name='list_id' id='list_id' value='{{ old('list_id', $task->list_id) }}'>
            @include('modules.error-field', ['fieldName' => 'list_id'])
        </div>

        <input type='submit' value='Update task' class='btn btn-primary btn-small'>
    </form>

@endsection

@push('body')
    <script>$( "#due_date" ).datepicker({ dateFormat: 'yy-mm-dd' });</script>
@endpush
