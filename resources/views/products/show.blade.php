@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h2>Show Product</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-secondary" href="{{ route('products.index') }}">Back</a>
        </div>
    </div>
    <div class="col-lg-12">
        <ul>
            <li> {{ $product->name }} </li>
            <li> {{ $product->detail }} </li>
            <img width="200" src="../storage/image/{{$product->thumbnail}}" alt="{{ $product->thumbnail}}">

        </ul>
    </div>
</div>

@endsection
