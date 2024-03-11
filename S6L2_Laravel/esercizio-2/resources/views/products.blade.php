
@extends('templates.layout')

@section('title', $title)
@section('content')

<a type="button" class="btn btn-outline-dark" href="/app/products/create">Add Product</a>
<div class="card my-3">
        <ul class="list-group list-group-flush">
            @if($products)
                @foreach($products as $key => $value)
                    <li class="list-group-item">
                        {{$value['model']}} {{$value['name']}} ${{$value['price']}}
                        <span class="float-end">
                            <a type="button" class="btn btn-outline-info" href="#">Info</a>
                        </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

@endsection
