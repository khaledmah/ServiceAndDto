@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}">
        <textarea name="content">{{ $post->content }}</textarea>
        <input type="text" name="author" value="{{ $post->author }}">
        <button type="submit">Update</button>
    </form>
@endsection
