@extends('layouts.app')
@section('content')
    <h1>Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" value="{{ old('title') }}">
        <textarea name="content" placeholder="Content">{{ old('content') }}</textarea>
        <input type="text" name="author" placeholder="Author" value="{{ old('author') }}">
        <button type="submit">Submit</button>
    </form>
@endsection
