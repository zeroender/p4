@extends('layouts.master')

@push('head')

@endpush

@section('title')
    All Categories
@endsection

@section('content')

    <h1>Categories</h1>

    @foreach($categories as $category)
        <div class='category cf'>
            <h2>{{ $category['name'] }}</h2>
            <a href='/category/{{ $category['id'] }}'>View</a> |
            <a href='/category/{{ $category['id'] }}/edit'>Edit</a> |
            <a href='/category/{{ $category['id'] }}/delete'>Delete</a>
        </div>
    @endforeach

@endsection
