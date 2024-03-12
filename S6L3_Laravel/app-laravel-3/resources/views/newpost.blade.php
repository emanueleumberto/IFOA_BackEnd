@extends('templates.layout')
@section('title', 'New Post')

@section('content')
    <form method="post" action="/posts">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="Title...">
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="description" placeholder="Leave a post here"></textarea>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @if($users)
                @foreach($users as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="post_thumb">
        </div>
        <button type="submit" class="btn btn-dark">Add Post</button>
    </form>
@endsection
