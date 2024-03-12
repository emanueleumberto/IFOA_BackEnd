@extends('templates.layout')
@section('title', 'Edit Post')

@section('content')
    <form method="post" action="/posts/update">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="Title..." value="{{$post->title}}">
            <input type="hidden" name="id" value="{{$post->id}}">
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="description" placeholder="Leave a post here">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="post_thumb" value="{{$post->post_thumb}}">
        </div>
        <button type="submit" class="btn btn-dark">Edit Post</button>
    </form>
@endsection
