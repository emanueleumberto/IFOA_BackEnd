<?php
    var_dump($book);
?>

@extends('templates.layout')
@section('title', 'Book Detail')

@section('content')
    @if($book)
        <div class="row g-0">

        </div>
    @endif
@endsection
