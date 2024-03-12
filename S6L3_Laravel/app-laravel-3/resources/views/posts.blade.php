@extends('templates.layout')
@section('title', 'New Post')

@section('content')
    <ul class="list-group list-group-flush">
        @if($posts)
        @foreach($posts as $key => $value)
        <li class="list-group-item">
            <img src="{{$value->post_thumb}}" style="width: 50px" /> {{$value->title}}
            <span class="float-end">
                <a type="button" class="btn btn-outline-info" href="/posts?id={{$value->id}}">Info</a>
                <a type="button" class="btn btn-outline-info" href="/posts/{{$value->id}}">Info</a>
                <a type="button" class="btn btn-outline-warning" href="/posts/{{$value->id}}/edit">Edit</a>
                <a type="button" class="btn btn-outline-danger" href="/posts/{{$value->id}}/destroy">Delete</a>
            </span>
        </li>
        @endforeach
        @endif
    </ul>
@endsection
