@extends('layouts.master')

@push('head')
    <link href='/css/book/show.css' rel='stylesheet'>
@endpush

@section('title')
    {{ $category->name }}
@endsection

@section('content')

    <h2>{{ $category['name'] }}</h2>

    <p>{{ $category['description'] }}</p>

    <p><a href='/category/{{ $category['id'] }}/edit'>Edit</a></p>
    <p><a href='/category/{{ $category['id'] }}/delete'>Delete</a></p>

@endsection
