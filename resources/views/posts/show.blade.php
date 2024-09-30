@extends('layouts.app')
@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>{{ $post->author }}</p>
    <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Post</button>
    </form>
@endsection
