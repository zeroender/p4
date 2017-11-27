@extends('layouts.master')

@section('title')
    Create new task
@endsection

@section('content')

    <h1>Add a task</h1>

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
            <input type='text' class="form-control" name='description' id='description' value='{{ old('description', 'Drive to stop and shop, pick up eggs, milk, and bread') }}'>
            @include('modules.error-field', ['fieldName' => 'description'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='status'>* Status</label>
            <select type='dropdown' class="form-control" name='status' id='status' value='{{ old('status') }}'>
                <option>not started</option>
                <option>in progress</option>
                <option>completed</option>
                <option>blocked</option>
            </select>
            @include('modules.error-field', ['fieldName' => 'status'])
        </div>


        <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <label class="col-form-label" for='due_date'>Due Date</label>
                <input type='text' class="form-control" name='due_date' id='due_date' value='{{ old('due_date', '10/11/2018') }}'>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                @include('modules.error-field', ['fieldName' => 'due_date'])
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label" for='dependent_task_id'>Blocks</label>
            <input type='text' class="form-control" name='dependent_task_id' id='dependent_task_id' value='{{ old('dependent_task_id') }}'>
            @include('modules.error-field', ['fieldName' => 'dependent_task_id'])
        </div>

        <div class="form-group">
            <label class="col-form-label" for='list_id'>Category</label>
            <input type='text' class="form-control" name='list_id' id='list_id' value='{{ old('list_id') }}'>
            @include('modules.error-field', ['fieldName' => 'list_id'])
        </div>

        <input type='submit' value='Add task' class='btn btn-primary btn-small'>
    </form>

@endsection
