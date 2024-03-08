
@extends('templates.layout')

@section('title', $title)
@section('content')

    <form method="post" action="{{route('users')}}">
        @csrf
        <input type="text" name="title" />
        <button type="submit">add</button>
    </form>

@endsection
