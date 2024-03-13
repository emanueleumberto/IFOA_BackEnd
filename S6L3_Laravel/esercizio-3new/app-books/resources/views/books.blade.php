@extends('templates.layout')
@section('title', 'BookList')

@section('content')
    <ul class="list-group list-group-flush">
        @if($books)
            @foreach($books as $key => $value)
                <li class="list-group-item">
                    {{$value->title}} | pages {{$value->pages}}
                    <span class="float-end">
                        <a type="button" class="btn btn-outline-info" href="/books/{{$value->id}}">Info</a>
                    </span>
                </li>
            @endforeach
        @endif
    </ul>
@endsection
