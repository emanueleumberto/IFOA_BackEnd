@extends('templates.layout')
@section('title', 'Book Detail')

@section('content')
    @if($book)
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <p class="card-text">Pages: {{$book->pages}}</p>
                    <p class="card-text">Year: {{$book->year}}</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated {{$book->updated_at}}</small></p>
                </div>
                <div class="card-body">
                    <a type="button" class="btn btn-outline-dark d-block" href="/books">Back</a>
                </div>
            </div>
        </div>
    @endif
@endsection
