@extends('templates.layout')
@section('title', 'New Post')

@section('content')
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$post->post_thumb}}" class="img-fluid rounded-start" alt="{{$post->title}}">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <p class="card-text"><small class="text-body-secondary">Last updated {{$post->updated_at}}</small></p>
            </div>
            <div class="card-body">
                <a type="button" class="btn btn-outline-dark d-block" href="/posts">Back</a>
            </div>
        </div>
    </div>
@endsection
