
@extends('templates.layout')

@section('title', $title)
@section('content')

    <form method="post" action="/app/products">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Name...">
        </div>
        <div class="mb-3">
            <input type="text" name="model" class="form-control" placeholder="Model...">
        </div>
        <div class="mb-3">
        <input type="number" name="price" class="form-control" placeholder="Price...">
        </div>
        <button type="submit" class="btn btn-dark">Add Product</button>
    </form>

@endsection
